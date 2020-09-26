<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductLink;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);

        return view('user.product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('user.product.create', compact('categories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'general_price' => ['required', 'digits_between:2,20'],
            'description' => ['nullable', 'string'],
            'image_path' => ['required', 'string'],
            'category' => ['required'],
        ]);

        $product = Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'general_price' => $request->general_price,
            'description' => $request->description,
            'image_path' => $request->image_path,
            'category_id' => $request->category,
        ]);

        if ($product) {
            $request->session()->flash('alert', [
                'message' => 'Produk berhasil ditambahkan',
                'type' => 'success',
            ]);
        } else {
            $request->session()->flash('alert', [
                'message' => 'Produk gagal ditambahkan',
                'type' => 'danger',
            ]);
        }

        return redirect()->route('user.products.create');
    }

    /**
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->checkPermission($product->user_id);
        $categories = Category::all();

        return view('user.product.edit', compact('product', 'categories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['required', 'exists:categories,id'],
        ]);

        $this->checkPermission($product->user_id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        if ($product->save()) {
            $request->session()->flash('alert', [
                'message' => 'Produk berhasil diperbarui',
                'type' => 'success',
            ]);
        } else {
            $request->session()->flash('alert', [
                'message' => 'Produk gagal diperbarui',
                'type' => 'danger',
            ]);
        }

        return redirect()->route('user.products.edit', $product);
    }

    private function checkPermission($userId)
    {
        $isOwned = $userId == auth()->id();
        abort_unless($isOwned, 403); // TODO: Add role check
    }
}
