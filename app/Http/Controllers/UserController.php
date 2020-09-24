<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductLink;

class UserController extends Controller
{
    public $perPage = 3;

    public function index()
    {
        $products = Product::paginate(3);

        return view('admin.dashboard', compact('products'));
    }

    public function product()
    {
        $products = Product::paginate($this->perPage);

        return view('admin.dashboard', compact('products'));
    }

    public function category()
    {
        $categories = Category::paginate($this->perPage);

        return view('admin.category', compact('categories'));
    }

    public function productLink()
    {
        $productLink = ProductLink::paginate($this->perPage);

        return view('admin.product_link', compact('productLink'));
    }
}
