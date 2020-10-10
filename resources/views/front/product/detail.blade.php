@extends('layouts.frontpage')
@section('title', $product->name)
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details">
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ $product->image_link }}" alt="">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="">
                    <h2>{{ $product->name }}</h2>
                    <img src="{{ asset('images/product-details/rating.png')}}" alt="">
                    <span>
                        <span>Rp {{ $product->general_price }}</span>
                    </span>
                    <p><b>Ketersediaan:</b> Dalam Stok</p>
                    <p><b>Kondisi:</b> Baru</p>
                    <p><b>Brand:</b> LaurinCraft</p>
                    <p><b>Silahkan Beli Melalui :</b></p>

                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-12">
                            @foreach ($product->links as $item)
                            <div class="panel panel-success">
                                <div class="panel-heading">{{ $item->name }}</div>
                                <div class="panel-body">
                                    <strong>Harga</strong> : Rp. {{ $item->price }}
                                    <a href="{{ $item->url }}" class="btn btn-succes" type="button">Beli Sekarang</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('front.partials.recommended-section', compact('recommended'))
    </div>
@endsection
