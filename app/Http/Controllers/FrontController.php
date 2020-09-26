<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::query()
            ->paginate(3)
            ->fragment('products');
        $recommended = Product::all()->take(3);

        return view('front.product.lists', compact('products', 'categories', 'recommended'));
    }

    public function detail(Product $product)
    {
        $categories = Category::all();
        $recommended = Product::all()->take(3);

        return view('front.product.detail', compact('product', 'categories', 'recommended'));
    }
}
