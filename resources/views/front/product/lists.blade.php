@extends('layouts.frontpage', ['withSidebar' => true])
@section('title','Daftar Produk Kerajinan')
@section('content')
    <div class="col-sm-9 padding-right">
        <div id="products" class="features_items">
            <h2 class="title text-center">Daftar Produk Kerajinan</h2>
            @foreach ($products as $product)
                <div class="col-sm-4">
                    @include('front.partials.product-card', compact('product'))
                </div>
            @endforeach
            {!! $products->links() !!}
        </div>
    </div>
@endsection
