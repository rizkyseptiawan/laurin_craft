<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::select(['name', 'slug'])->get();
        $products = Product::query()
            ->limit(3)
            ->latest()
            ->get();
        $recommended = Product::query()
            ->limit(3)
            ->oldest()
            ->get();

        return view('front.homepage', compact('products', 'categories', 'recommended'));
    }

    public function productsList(Request $request)
    {
        $categories = Category::select(['name', 'slug'])->get();
        $products = Product::query()
            ->when($request->has('category'), function ($q) {
                return $q->whereHas('category', function ($q) {
                    return $q->where('slug', request('category'));
                });
            })
            ->paginate(3)
            ->fragment('products');

        return view('front.product.lists', compact('products', 'categories'));
    }

    public function productDetail(Product $product)
    {
        $categories = Category::all();
        $recommended = Product::all()->take(3);

        return view('front.product.detail', compact('product', 'categories', 'recommended'));
    }
}
