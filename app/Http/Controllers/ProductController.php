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

    public function show($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $productLink = ProductLink::all()->where('product_id', $id);
        $recommended =Product::all()->take(3);

        return view('front.product_details', compact('Product', 'ProductLink', 'categories', 'recommended'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => ['required', 'alpha_dash', 'min:2', 'max:50', 'unique:products,slug'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'general_price' => ['required', 'digits_between:2,20'],
            'description' => ['nullable', 'string'],
            'image_path' => ['required', 'string'],
            'category' => ['required'],
        ]);
        $product = Product::create([
            'user_id' => auth()->id(),
            'slug' => $request->slug,
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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->checkPermission($product->user_id);
        $categories = Category::all();

        return view('user.edit_product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $product = Product::findOrFail($id);
        $this->checkPermission($product->user_id);
        $product->name = $request->name;
        $product->description = $request->description;
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

        return redirect()->route('user.products.edit', ['id' => $id]);
    }

    public function createLink($id)
    {
        $product = Product::findOrFail($id);
        $this->checkPermission($product->user_id);

        return view('user.create_product_link', compact('product'));
    }

    public function storeLink(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
            'active' => ['in:0,1'],
        ]);
        $product = Product::findOrFail($id);
        $this->checkPermission($product->user_id);
        $productLinks = ProductLink::create([
            'product_id' => $product->id,
            'price' => $request->price,
            'name' => $request->name,
            'url' => $request->url,
            'is_active' => $request->active,
        ]);
        if ($productLinks) {
            $request->session()->flash('alert', [
                'message' => 'Link produk berhasil ditambahkan',
                'type' => 'success',
            ]);
        } else {
            $request->session()->flash('alert', [
                'message' => 'Link produk gagal ditambahkan',
                'type' => 'danger',
            ]);
        }

        return redirect()->route('user.link.create', ['id'=> $product->id]);
    }

    public function editLink($id, $linkId)
    {
        $product = Product::findOrFail($id);
        $this->checkPermission($product->user_id);
        $productLinks = ProductLink::findOrFail($linkId);

        return view('user.edit_product_link', compact('product', 'productLinks'));
    }

    public function updateLink(Request $request, $id, $linkId)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
        ]);
        $product = Product::findOrFail($id);
        $this->checkPermission($product->user_id);
        $productLinks = ProductLink::findOrFail($linkId);
        $productLinks->name = $request->name;
        $productLinks->url = $request->url;
        $productLinks->price = $request->price;
        if ($productLinks->save()) {
            $request->session()->flash('alert', [
                'message' => 'Link produk berhasil diperbarui',
                'type' => 'success',
            ]);
        } else {
            $request->session()->flash('alert', [
                'message' => 'Link produk gagal diperbarui',
                'type' => 'danger',
            ]);
        }

        return redirect()->route('user.link.edit', ['id' => $id, 'linkId' => $linkId]);
    }

    private function checkPermission($userId)
    {
        $isOwned = $userId == auth()->id();
        abort_unless($isOwned, 403); // TODO: Add role check
    }
}
