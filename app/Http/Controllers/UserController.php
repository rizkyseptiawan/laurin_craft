<?php

namespace App\Http\Controllers;

use App\Product;

class UserController extends Controller
{
    public $perPage = 5;

    public function index()
    {
    }

    public function product()
    {
        $products = Product::paginate($this->perPage);

        return view('user.dashboard', compact('products'));
    }
}
