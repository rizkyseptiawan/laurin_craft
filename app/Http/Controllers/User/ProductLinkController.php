<?php

namespace App\Http\Controllers\User;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductLinkController extends Controller
{
    public function create(Product $product)
    {
        $this->checkPermission($product->user_id);
    
        return view('user.create_product_link', compact('product'));
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

    private function checkPermission($userId)
    {
        $isOwned = $userId == auth()->id();
        abort_unless($isOwned, 403); // TODO: Add role check
    }
}
