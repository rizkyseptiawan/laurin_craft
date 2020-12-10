<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $authUser = Auth::user();
        $orders = Order::query();
        if($authUser->hasRole('User')){
            $orders->where('user_id', $authUser->id);
        }
        $orders = $orders->paginate();
        return view('user.order.index', compact('orders'));
    }

    public function addReceiptNumber($id)
    {
        $order = Order::findOrFail($id);
        return view('user.order.add_receipt',compact('order'));    
    }

    public function updateReceiptNumber(Request $request,$id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'receipt_number' => 'required|string'
        ]);
        $order->update([
            'receipt_number' => $request->receipt_number
        ]);
        $request->session()->flash('alert', [
            'message' => 'Resi berhasil diperbarui',
            'type' => 'success',
        ]);
        return redirect()->route('user.orders.edit.receipt', $order->id);

    }
}
