<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductLink;

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

    public function productLink()
    {
        $productLink = ProductLink::paginate($this->perPage);

        return view('user.product_link', compact('productLink'));
    }
}
