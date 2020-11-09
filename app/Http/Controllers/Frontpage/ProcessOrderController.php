<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Xendit\Invoice;

class ProcessOrderController extends Controller
{
    public function __invoke()
    {
        $cartItems = Session::get('carts', collect());

        if (!$cartItems) {
            return redirect()->route('frontpage.cart');
        }

        $invoice = DB::transaction(function() use ($cartItems) {
            $order = Order::create([
                'user_id' => Auth::id()
            ]);

            $cartItems->map(function ($cartItem) use ($order) {
                $order->orderDetails()->create([
                    'product_id' => $cartItem['id'],
                    'price' => $cartItem['price'],
                    'qty' => $cartItem['qty'],
                ]);
            });

            $total = $cartItems->sum(function ($cartItem) {
                return $cartItem['price'] * $cartItem['qty'];
            });

            $invoice = Invoice::create([
                'external_id' => "laurinid_{$order->id}",
                'payer_email' => 'alfina@xendit.co',
                'description' => 'Order Produk dari LaurinCraft',
                'amount' => $total
            ]);

            $order->update([
                'xendit_invoice_id' => $invoice['id'],
                'total' => $total,
            ]);

            Session::forget('carts');

            return $invoice;
        });

        if (array_key_exists('invoice_url', $invoice)) {
            return redirect($invoice['invoice_url']);
        }

        return redirect()->route('frontpage.cart');
    }
}
