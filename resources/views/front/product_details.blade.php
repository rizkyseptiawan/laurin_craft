@extends('layouts.app')
@section('title','Daftar Produk')
@section('slider')
@endsection

@section('content')
<div class="col-sm-9 padding-right">
    <div class="product-details">
        <!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ $product->image_link }}" alt="">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!--/product-information-->
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
                        @foreach ($productLink as $item)
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
            <!--/product-information-->
        </div>
    </div>
    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Barang yang Disarankan</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($recommended as $item)

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('images/'.$item->image_path)}}" alt="" />
                                    <h2>Rp {{ $item->general_price }}</h2>
                                    <p>{{ $item->name }}</p>
                                    <a href="{{ route('frontpage.product.detail', ['id'=> $item->id]) }}"
                                        class="btn btn-default add-to-cart"><i class="fa fa-eye"></i> Lihat Produk</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->

</div>
@endsection
