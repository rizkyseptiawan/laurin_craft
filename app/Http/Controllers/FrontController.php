<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductLink;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        $recommended =Product::all()->take(3);
        // dd($products);
        return view('front.product_list',compact('products' , 'categories','recommended'));
    }

    public function show($id){
        $categories = Category::all();
        $Product = Product::findOrFail($id);
        $ProductLink = ProductLink::all()->where('product_id', $id);
        $recommended =Product::all()->take(3);
        
        return view('front.product_details',compact('Product','ProductLink','categories','recommended'));
    }
}
