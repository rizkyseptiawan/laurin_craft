<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function cart(Request $request)
    {
        Session::put('carts', [
            [
                'name' => 'Cangkir Batok Kelapa 1',
                'image_link' => '/images/cangkir.jpg',
                'link' => '/images/cangkir.jpg',
                'qty' => 2,
                'max_qty' => 10,
                'price' => 10000,
            ]
        ]);

        if ($request->ajax()) {
            if ($request->method() === 'POST') {
                Session::put('carts', $request->post('carts'));
            }

            return response()->json(Session::get('carts'));
        }

        return view('front.cart');
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
