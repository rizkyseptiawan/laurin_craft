<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Str;
use App\Traits\BelongsToUserAction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use BelongsToUserAction;

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
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'general_price' => ['required', 'digits_between:2,20'],
            'description' => ['nullable', 'string'],
            'image_path' => ['required', 'mimes:jpeg,png,jpg'],
            'category' => ['required', 'exists:categories,id'],
        ]);
        if ($request->hasFile('image_path')) {
            $uploadFile = $request->file('image_path');
            $destinationPath = 'uploads/produk/';// upload path
            $fileName = date('YmdHis'). '-' . Str::random(25) . "_product.".$uploadFile->getClientOriginalExtension();
            $uploadFile->move($destinationPath, $fileName);
            $fileName = $destinationPath.$fileName;
        }
        $product = Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'general_price' => $request->general_price,
            'description' => $request->description,
            'image_path' => isset($fileName) ? $fileName : '',
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
        if(auth()->user()->hasRole('User')){
        $this->checkPermission($product->user_id);
        }
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
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'description' => ['nullable', 'string'],
            'image_path' => ['nullable', 'mimes:jpeg,png,jpg'],
            'category' => ['required', 'exists:categories,id'],
        ]);
        if(auth()->user()->hasRole('User')){
            $this->checkPermission($product->user_id);
        }
        if ($request->hasFile('image_path')) {
            $uploadFile = $request->file('image_path');
            $destinationPath = 'uploads/produk/';// upload path
            $fileName = date('YmdHis'). '-' . Str::random(25) . "_product.".$uploadFile->getClientOriginalExtension();
            $uploadFile->move($destinationPath, $fileName);
            $fileName = $destinationPath.$fileName;
        }
        if(isset($fileName)){
            $product->image_path = $fileName;
        }
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
}
