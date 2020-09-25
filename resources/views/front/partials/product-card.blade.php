<div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
            <img src="{{ asset($product->image_link) }}" style="object-fit: cover;height:300px;" alt="" />
            <h2>Rp {{ $product->general_price }}</h2>
            <p>{{ $product->name}}</p>
            <a href="{{ route('frontpage.product.detail', $product) }}" class="btn btn-primary add-to-cart text-white">
                <i class="fa fa-eye"></i> Lihat Produk
            </a>
        </div>
    </div>
    <div class="choose">
        <ul class="nav nav-pills nav-justified">
            <li><a href="#"><i class="fa fa-plus-square"></i>Tambah Ke Daftar Keinginan</a></li>
        </ul>
    </div>
</div>