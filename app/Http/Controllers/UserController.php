<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductLink;

class UserController extends Controller
{
    public $perPage = 5;

    public function index()
    {
        $products = Product::where()->paginate(3);

        return view('admin.dashboard', compact('products'));
    }

    public function product()
    {
        $products = Product::paginate($this->perPage);

        return view('admin.dashboard', compact('products'));
    }

    public function productLink()
    {
        $productLink = ProductLink::paginate($this->perPage);

        return view('admin.product_link', compact('productLink'));
    }
}
