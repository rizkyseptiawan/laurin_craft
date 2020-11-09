<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;

class XenditWebhookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->header('x-callback-token') !== config('services.xendit.callback_token')) {
            abort(400, "Invalid callback token.");
        }

        $order = Order::firstWhere('xendit_invoice_id', $request->post('id'));

        if (
            $order &&
            $request->post('status') === 'PAID' &&
            $request->post('paid_at')
        ) {
            $order->update([
                'paid_at' => new Carbon($request->post('paid_at'))
            ]);
        }

        if (
            $order &&
            $request->post('status') === 'EXPIRED' &&
            $request->post('expiry_date')
        ) {
            $order->update([
                'expiry_date' => new Carbon($request->post('expiry_date'))
            ]);
        }

        return response()->json($request->post());
    }
}
