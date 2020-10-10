<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductLink;
use App\Traits\BelongsToUserAction;
use Illuminate\Http\Request;

class ProductLinkController extends Controller
{
    use BelongsToUserAction;

    public function index()
    {
        $productLink = ProductLink::paginate(5);

        return view('user.product-link.index', compact('productLink'));
    }

    public function create(Product $product)
    {
        $this->checkPermission($product->user_id);

        return view('user.product-link.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $this->checkPermission($product->user_id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
            'active' => ['in:0,1'],
        ]);

        $this->checkPermission($product->user_id);

        $productLink = ProductLink::create([
            'product_id' => $product->id,
            'price' => $request->price,
            'name' => $request->name,
            'url' => $request->url,
            'is_active' => $request->active,
        ]);

        if ($productLink) {
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

        return redirect()->route('user.product-link.create', $product);
    }

    public function edit(Product $product, ProductLink $productLink)
    {
        $this->checkPermission($product->user_id);

        return view('user.product-link.edit', compact('product', 'productLink'));
    }

    public function update(Request $request, Product $product, ProductLink $productLink)
    {
        $this->checkPermission($product->user_id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
            'active' => ['in:0,1'],
        ]);

        $productLink->name = $request->name;
        $productLink->url = $request->url;
        $productLink->price = $request->price;
        $productLink->is_active = $request->active;
        if ($productLink->save()) {
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

        return redirect()->route('user.product-link.edit', ['product' => $product, 'productLink' => $productLink]);
    }
}
