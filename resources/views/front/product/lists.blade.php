@extends('layouts.app')
@section('title','Daftar Produk')
@section('slider')
<section id="slider">
    <!--slider-->
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
</section>
<!--/slider-->
@endsection

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
    @include('front.partials.recommended-section', compact('recommended'))
</div>
@endsection
