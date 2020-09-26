@extends('layouts.frontpage')
@section('content')
<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="step-one">
                <h2 class="heading">Step1</h2>
            </div>
            <div class="checkout-options">
                <h3>Pengguna Baru</h3>
                <p>Opsi Checkout</p>
                <ul class="nav">
                    <li>
                        <label><input type="checkbox"> Daftar Akun</label>
                    </li>
                    <li>
                        <label><input type="checkbox"> Checkout sebagai Tamu</label>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-times"></i>Cancel</a>
                    </li>
                </ul>
            </div><!--/checkout-options-->

            <div class="register-req">
                <p>Silakan gunakan Daftar dan Checkout untuk mendapatkan akses ke riwayat pesanan Anda dengan mudah, atau gunakan Checkout sebagai Tamu</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Informasi Pembeli</p>
                            <form>
                                <input type="text" placeholder="Nama Lengkap">
                                <input type="text" placeholder="Nama Pengguna">
                                <input type="password" placeholder="Kata Sandi">
                                <input type="password" placeholder="Konfirmasi Kata Sandi">
                            </form>
                            <a class="btn btn-primary" href="">Lanjutkan</a>
                        </div>
                    </div>
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Tagihan Kepada</p>
                            <div class="form-one">
                                <form>
                                    <input type="text" placeholder="Nama Perusahaan">
                                    <input type="text" placeholder="Email*">
                                    <input type="text" placeholder="Title">
                                    <input type="text" placeholder="Nama Lengkap *">
                                    <input type="text" placeholder="Alamat Lengkap *">
                                </form>
                            </div>
                            <div class="form-two">
                                <form>
                                    <input type="text" placeholder="Kode Pos *">
                                    <select>
                                        <option>-- Negara --</option>
                                        <option>Indonesia</option>
                                    </select>
                                    <select>
                                        <option>-- Kota / Daerah --</option>
                                        <option>Bondowoso</option>
                                        <option>Situbondo</option>
                                        <option>Jember</option>
                                        <option>Banyuwangi</option>
                                        <option>Lumajang</option>
                                    </select>
                                    <input type="password" placeholder="Konfirmasi Kata Sandi">
                                    <input type="text" placeholder="Telepon *">
                                    <input type="text" placeholder="Nomor Hp">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Pengiriman Pemesanan</p>
                            <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                            <label><input type="checkbox"> Kirim ke alamat tagihan</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Ulasan &amp; Pembayaran</h2>
            </div>

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
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tbody><tr>
                                        <td>Cart Sub Total</td>
                                        <td>Rp 30.000</td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Biaya Pengiriman</td>
                                        <td>Gratis</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span>Rp 30.000</span></td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="payment-options">
                    <span>
                        <label><input type="checkbox"> Bank Transfer</label>
                    </span>
                    <span>
                        <label><input type="checkbox"> Cek Pembayaran</label>
                    </span>
                </div>
        </div>
</section>
@endsection
