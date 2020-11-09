<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Xendit\Xendit;

class OrderController extends Controller
{
    
    public function order(Request $request)
    {
        Xendit::setApiKey(env('XENDIT_SECRET_KEY', 'xnd_development_1rztRklKeJ3wcimTnzlzujqvyifGM8eU1Aq4sUr0CW2YIluYrudegcwfxO2Jmjs'));
        $params = [ 
            'external_id' => 'demo_1475801962607',
            'payer_email' => 'alfina@xendit.co',
            'description' => 'Trip to Bali',
            'amount' => 50000
          ];
        
          $createInvoice = \Xendit\Invoice::create($params);
          return response()->json($createInvoice, 200);
    }
}
