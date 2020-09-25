<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductLink;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $recommended = Product::all()->take(3);

        return view('front.product_list', compact('products', 'categories', 'recommended'));
    }

    public function detail(Product $product)
    {
        $categories = Category::all();
        $productLink = $product->links;
        $recommended = Product::all()->take(3);

        return view('front.product_details', compact('product', 'productLink', 'categories', 'recommended'));
    }
}
