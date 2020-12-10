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
    <section id="check_shipping">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Tagihan Kepada</p>
                        <div class="form-one">
                            <form>
                                <input type="text" x-model="bill.name" placeholder="Nama Penerima *">
                                <input type="text" x-model="bill.address" placeholder="Alamat Lengkap *">
                                <input type="text" x-model="bill.phone" placeholder="Nomor Hp *">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <select x-model="selectedProvince" @change.prevent="onProvinceChange()">
                                    <option>-- Provinsi --</option>
                                    <template x-for="p in provinces">
                                        <option :value="p.province_id" x-text="p.province"></option>
                                    </template>
                                </select>
                                <select x-model="selectedCity">
                                    <option>-- Kota / Daerah --</option>
                                    <template x-for="c in cities">
                                        <option :value="c.city_id" x-text="c.city_name"></option>
                                    </template>
                                </select>
                                <select x-model="shipping" @change.prevent="onShippingChange()">
                                    <option>-- Pilih Ekspedisi --</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">Tiki</option>
                                    <option value="pos">Pos</option>
                                    <option value="jet">J&T</option>
                                </select>
                                <select x-model="selectedService" @change.prevent="onServiceChange()" :disabled="services == null">
                                    <option>-- Pilih Layanan --</option>
                                    <template x-for="s in services">
                                        <option :value="s.cost" x-text="s.service"></option>
                                    </template>
                                </select>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="total_area">
                        <ul>
                            <li>Berat <span x-text="weighttotal()"></span></li>
                            <li>Sub Total <span x-text="rupiahFormatter(subtotal())"></span></li>
                            <li>Biaya Pengiriman <span x-text="shippingCost === 0 ? 'Gratis' : rupiahFormatter(shippingCost)"></span></li>
                            <li>Total <span x-text="rupiahFormatter(total())"></span></li>
                        </ul>
                        <a class="btn btn-default update" href="#" :disabled="!isCartAvailable()" @click.prevent="fetchData()">Perbarui</a>
                        <a class="btn btn-default check_out" @click.prevent="onCheckoutClick()" :disabled="!isCartAvailable()">Check Out</a>
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
                selectedProvince:'',
                selectedCity:'',
                selectedService:'',
                shipping:'',
                bill: {
                    name: '',
                    address: '',
                    phone: '',
                },
                services:[],
                provinces: [],
                cities: [],
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
                onCheckoutClick(){
                    axios.post("{{ route('frontpage.customer.data') }}", this.bill)
                        .then(res => {
                            window.location = "{{ route('frontpage.order') }}";
                        })
                        .catch(err => {
                            alert('Terjadi kesalahan! Halaman akan dimuat ulang');
                            window.location.reload();
                        });
                },
                onProvinceChange(){
                    axios.get(`/cities?id=${this.selectedProvince}`).then(res => {
                        this.cities = res.data
                    });
                },
                onShippingChange(){
                    axios.get(`/shipping/check?destination_id=${this.selectedCity}&courier=${this.shipping}`).then(res => {
                        this.services = res.data
                    });
                },
                onServiceChange(){
                    axios.post('/shipping/cost', {
                            cost: this.selectedService,
                        })
                        .then(res => {
                            this.shippingCost = this.selectedService
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
                    this.fetchDataProvinces()
                    axios.get(this.action)
                        .then(res => {
                            this.carts = res.data;
                        });
                },
                fetchDataProvinces(){
                    axios.get('/provinces').then(res => {
                            this.provinces = res.data
                        });
                },
                subtotal() {
                    let total = 0;

                    this.carts.forEach(item => {
                        total += item.price * item.qty;
                    });

                    return total;
                },
                weighttotal(){
                    let weighttotal = 0;

                    this.carts.forEach(item => {
                        weighttotal += item.weight;
                    });

                    return weighttotal + ' Kg';
                },
                total() {
                    return parseInt(this.subtotal()) + parseInt(this.shippingCost);
                },
                rupiahFormatter (value) {
                    return 'Rp. ' + value.toLocaleString();
                },
            };
        }
    </script>
@endpush
