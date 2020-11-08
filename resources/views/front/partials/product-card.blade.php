<div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
            <img src="{{ asset($product->image_link) }}" style="object-fit: cover;height:300px;" alt="" />
            <h2>Rp {{ $product->general_price }}</h2>
            <p>{{ $product->name}}</p>
            <a href="{{ route('frontpage.product.detail', $product) }}" class="btn btn-primary text-white">
                <i class="fa fa-eye"></i> Lihat Produk
            </a>
        </div>
    </div>
    <div class="choose">
        <ul class="nav nav-pills nav-justified">
            @php
                $isExist = session()->get('carts', collect())->contains('id', $product->id);
            @endphp
            <li>
                <a
                    href="{{ $isExist ? route('frontpage.cart') : 'javascript:void(0)' }}"
                    @unless($isExist)
                    class="add-to-cart"
                    data-id="{{ $product->id }}"
                    data-qty="1"
                    @endunless
                >
                    <i class="fa {{ $isExist ? 'fa-shopping-cart' : 'fa-plus-square' }}"></i>
                    {{ $isExist ? 'Lihat di keranjang' : 'Tambah Ke Daftar Keinginan' }}
                </a>
            </li>
        </ul>
    </div>
</div>
