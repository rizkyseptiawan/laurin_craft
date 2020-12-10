<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\Session;

class ShippingCheckController extends Controller
{
    public function getProvinces()
    {
        $provinces = RajaOngkir::provinsi()->all();
        return response()->json($provinces, 200);
    }
    public function getCities(Request $request)
    {
        $cities = RajaOngkir::kota()->dariProvinsi($request->id)->get();
        return response()->json($cities, 200);
    }

    public function checkShipping(Request $request)
    {
        $cartItems = Session::get('carts', collect());
        $weightTotal = $cartItems->sum(function ($cartItem) {
            return $cartItem['weight'];
        });
        $check = RajaOngkir::ongkosKirim([
            'origin'        => 86,
            'originType'    => 'city',
            'destination'   => $request->has('destination_id') && $request->destination_id != null ? $request->destination_id : 155,
            'destinationType' => 'city',
            'weight'        => $weightTotal,
            'courier'       => $request->has('courier') ? $request->courier : 'jne'
        ])->get();
        $check = $check[0]['costs'];
        foreach ($check as $item) {
            $data[] = array(
                'service' => $item['service'],
                'cost' => $item['cost'][0]['value'],
                'estimate' => $item['cost'][0]['etd'],
            );
        }
        return response()->json($data, 200);
    }

    public function setShippingCost(Request $request)
    {
        Session::put('shipping_cost', $request->cost);
    }
}
