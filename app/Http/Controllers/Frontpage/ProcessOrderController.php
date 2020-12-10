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
        $customerData = Session::get('customer_data', collect());
        if (!$cartItems) {
            return redirect()->route('frontpage.cart');
        }

        $invoice = DB::transaction(function() use ($cartItems,$customerData) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'recipients_name' => $customerData['name'],
                'recipients_phone' => $customerData['phone'],
                'address' => $customerData['address'],
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
            $total +=  Session::get('shipping_cost');
            $invoice = Invoice::create([
                'external_id' => "laurinid_{$order->id}",
                'payer_email' => Auth::user()->email,
                'description' => 'Order Produk dari LaurinCraft',
                'amount' => $total
            ]);
            $order->update([
                'xendit_invoice_id' => $invoice['id'],
                'total' => $total,
            ]);

            Session::forget('carts');
            Session::forget('customer_data');
            return $invoice;
        });

        if (array_key_exists('invoice_url', $invoice)) {
            return redirect($invoice['invoice_url']);
        }

        return redirect()->route('frontpage.cart');
    }
}
