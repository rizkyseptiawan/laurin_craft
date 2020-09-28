@extends('layouts.frontpage')
@section('title','Keranjang Belanja')
@section('content')
<div x-data="cartData()" x-init="fetchData">
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table x-show.transition="isCartAvailable()" class="table table-condensed">
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
                                        <a class="cart_quantity_up" x-on:click.prevent="item.qty++;onCartChange();">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <input class="cart_quantity_input" type="number" name="quantity" min="1" x-model="item.qty" x-on:keyup="onCartChange()" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" x-on:click.prevent="item.qty--;onCartChange();">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" x-text="rupiahFormatter(item.price * item.qty)"></p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" @click.transition="deleteCart(cartsArray, index)" style="cursor:pointer;background-color:red">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <div x-show.transition="!isCartAvailable()" style="padding: 20px" class="h3 text-center">Belum ada barang di keranjang</div>
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
                        <a class="btn btn-default update" href="#" :disabled="!isCartAvailable()" @click.prevent="fetchData()">Perbarui</a>
                        <a class="btn btn-default check_out" href="#" :disabled="!isCartAvailable()">Check Out</a>
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
                token: '{{ csrf_token() }}',
                action: "{{ route('frontpage.cart') }}",
                carts: [],
                deleteCart(cartsArray, index) {
                    cartsArray.splice(index, 1);
                    this.onCartChange();
                },
                onCartChange() {
                    axios.post(this.action, {
                            action: 'update',
                            items: this.carts
                        })
                        .then(res => {
                            this.carts = res.data;
                        })
                        .catch(err => {
                            alert('Terjadi kesalahan! Halaman akan dimuat ulang');
                            window.location.reload();
                        });
                },
                isCartAvailable() {
                    return this.carts.length > 0;
                },
                fetchData() {
                    fetch(this.action, {
                        headers: {
                            "X-Requested-With": 'XMLHttpRequest',
                            "Accept": 'application/json',
                            "Content-Type": 'application/json'
                        }
                    })
                        .then(r => r.json())
                        .then(data => {
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
