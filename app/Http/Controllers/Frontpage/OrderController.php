<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Xendit\Xendit;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
    
    public function order()
    {
        Xendit::setApiKey(env('XENDIT_SECRET_KEY', 'xnd_development_1rztRklKeJ3wcimTnzlzujqvyifGM8eU1Aq4sUr0CW2YIluYrudegcwfxO2Jmjs'));
        $cartItems= Session::get('carts', collect());
        $total = 0;
        $order = \App\Order::create([
            'user_id' => auth()->user()->id
        ]);
        
        foreach ($cartItems as $item) {
            $orderDetail = \App\OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'qty' => $item['qty'],
            ]);
            $total += $item['price'] * $item['qty'];
        }
        $params = [ 
            'external_id' => 'laurinid_'.$order->id,
            'payer_email' => 'alfina@xendit.co',
            'description' => 'Order Produk dari LaurinCraft',
            'amount' => $total
        ];
        $createInvoice = \Xendit\Invoice::create($params);
        $order->update([
            'xendit_invoice_id' => $createInvoice['id'],
            'total' => $total,
        ]);
        Session::forget('carts');
        return redirect($createInvoice['invoice_url']);
    }

    public function getOrder()
    {
        $orders = \App\Order::whereUserId(auth()->user()->id)->get();
        if($orders->isEmpty()){
            abort(404);
        }
        return view('user.order.index',compact('orders'));
    }
}
