@extends('layouts.frontpage')
@section('title','Keranjang Belanja')
@section('content')
<div x-data="cartData()" x-init="fetchData">
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table x-show="carts.length > 0" class="table table-condensed">
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
                        <template x-for="(item, index, cartsArray) in carts" :key="item">
                            <tr>
                                <td class="cart_product">
                                    <a :href="item.link"><img :src="item.image_link" width="100" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a :href="item.link" x-text="item.name"></a></h4>
                                </td>
                                <td class="cart_price">
                                    <p x-text="rupiahFormatter(item.price)"></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" @click.prevent="item.qty++">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <input class="cart_quantity_input" type="number" name="quantity" min="1" :max="item.max_qty" x-model="item.qty" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" @click.prevent="item.qty--">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" x-text="rupiahFormatter(item.price)"></p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" @click.transition="cartsArray.splice(index, 1)" style="cursor:pointer;background-color:red">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <div x-show="carts.length < 1" class="p-4 h3 text-center" colspan="6">Belum ada barang di keranjang</div>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span x-text="rupiahFormatter(subtotal())"></span></li>
                            <li>Biaya Pengiriman <span x-text="shippingCost === 0 ? 'Gratis' : rupiahFormatter(shippingCost)"></span></li>
                            <li>Total <span x-text="rupiahFormatter(total())"></span></li>
                        </ul>
                        <a class="btn btn-default update" href="#" @click.prevent="fetchData()">Perbarui</a>
                        <a class="btn btn-default check_out" href="#">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
    <script>
        function cartData () {
            return {
                shippingCost: 0,
                carts: [],
                fetchData() {
                    // TODO: fetch cart data from backend
                    fetch('/cart-data').then(response => response.json()).then(data => {
                        this.carts = data;
                    });
                },
                subtotal() {
                    let total = 0;

                    this.carts.forEach(item => {
                        total += item.price * item.qty;
                    });

                    return total;
                },
                total() {
                    return this.subtotal() + this.shippingCost;
                },
                rupiahFormatter (value) {
                    return 'Rp. ' + value.toLocaleString();
                },
            };
        }
    </script>
@endpush
