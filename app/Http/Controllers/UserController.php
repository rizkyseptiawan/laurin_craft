<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductLink;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);

        return view('admin.dashboard', compact('products'));
    }

    public function product()
    {
        $products = Product::paginate(3);

        return view('admin.dashboard',compact('products'));
    }

    public function category(){
        $categories = Category::all();
        return view('admin.category',compact('categories'));
    }
    public function productLink(){
        $productLink = ProductLink::all();
        return view('admin.product_link',compact('productLink'));
    }
}
