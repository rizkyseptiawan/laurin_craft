@extends('layouts.app')
@section('title','Daftar Produk')
@section('slider')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Laurin</span>-Craft</h1>
                                <h2>Tempat Pembelian Kerajinan Batok Kelapa</h2>
                                <p>Silahkan beli berbagai macam produk olahan dari produk kelapa kami. </p>
                                <button type="button" class="btn btn-default get">Dapatkan Sekarang</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/2.png" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Laurin</span>-Craft</h1>
                                <h2>100% Produk Asli Buatan Indonesia</h2>
                                <p>Semua produk merupakan buatan asli tangan orang Indonesia. </p>
                                <button type="button" class="btn btn-default get">Dapatkan Sekarang</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/1.png" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Laurin</span>-Craft</h1>
                                <h2>Mendaur ulang batok kelapa, menjadi barang yang lebih berharga</h2>
                                <p>Semua olahan bahan utamnya terbuat dari Batok kelapa yang telah dikeringkan. </p>
                                <button type="button" class="btn btn-default get">Dapatkan Sekarang</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/lampion.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->
@endsection

@section('content')
<div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Daftar Produk Kerajinan</h2>
            @foreach ($products as $item)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/cangkir3.jpg" alt="" />
                                <h2>Rp {{$item->general_price}}</h2>
                                <p>{{ $item->name}}</p>
                                <a href="{{ route('product.detail', ['id'=> $item->id]) }}" class="btn btn-primary add-to-cart text-white"><i class="fa fa-eye"></i> Lihat Produk</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>Rp {{$item->general_price}}</h2>
                                    <p>{{$item->name}}</p>
                                    <a href="{{ route('product.detail', ['id'=> $item->id]) }}" class="btn btn-primary add-to-cart"><i class="fa fa-eye"></i> Lihat Produk</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Tambah Ke Daftar Keinginan</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div><!--features_items-->
        
        
        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Barang yang Disarankan</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach ($recommended as $item)
                        <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/sendok.jpg" alt="" />
                                            <h2>Rp {{ $item->general_price }}</h2>
                                            <p>{{$item->name}}</p>
                                            <a href="{{ route('product.detail', ['id'=> $item->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Produk</a>
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
        </div><!--/recommended_items-->
        
    </div>
@endsection