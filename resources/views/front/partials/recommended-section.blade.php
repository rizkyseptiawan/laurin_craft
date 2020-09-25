<div class="recommended_items">
    <h2 class="title text-center">Barang yang Disarankan</h2>
    @foreach ($recommended as $product)
        <div class="col-sm-4">
            @include('front.partials.product-card', compact('product'))
        </div>
    @endforeach
</div>