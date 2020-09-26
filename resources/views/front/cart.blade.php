@extends('layouts.frontpage')
@section('content')
<section id="cart_items">
    <div class="container">
        @include('front.partials.breadcrumb', ['data' => [route('frontpage.cart') => 'Keranjang']])
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Harga</td>
                        <td class="quantity">Jumlah</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cangkir.jpg" width="100" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Cangkir Batok Kelapa</a></h4>
                            <p>Kode Produk : 201909-0001</p>
                        </td>
                        <td class="cart_price">
                            <p>Rp 10.000</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1"
                                    autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rp 10.000</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/lampion.jpg" width="100" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Lampion Batok Kelapa</a></h4>
                            <p>Kode Produk : 201909-0002</p>
                        </td>
                        <td class="cart_price">
                            <p>Rp 20.000</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1"
                                    autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rp 20.000</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>Rp 30.000</span></li>
                        <li>Biaya Pengiriman <span>Gratis</span></li>
                        <li>Total <span>Rp 30.000</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Perbarui</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
