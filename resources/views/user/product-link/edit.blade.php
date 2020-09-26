@extends('layouts.user')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Edit Link Produk</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('partials.flash')
                    {!! Form::open([ 'method' => 'patch', 'route' => ['user.product-link.update', 'product'=> $product, 'productLink' => $productLink]]) !!}
                        <h6 class="heading-small text-muted mb-4">Informasi Link Produk - {{ $product->name }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-produk">Nama Marketplace</label>
                                        <input type="text" id="input-produk" name="name" class="form-control form-control-alternative" placeholder="Nama Marketplace" value="{{ $productLink->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-harga">Harga pada Marketplace</label>
                                        <input name="price" type="text" id="input-harga" class="form-control form-control-alternative" placeholder="Contoh :  70000" value="{{ $productLink->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-url">Url</label>
                                        <input type="text" name="url" id="input-url"
                                            class="form-control form-control-alternative" placeholder="Url" value="{{ $productLink->url }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-active">Status Aktif</label>
                                        <select id="input-active" class="form-control form-control-alternative"
                                            name="active">
                                            <option value="">Pilih Status</option>
                                            <option value="1" {{ $productLink->is_active == 1 ? 'selected' : ''}}>Aktif</option>
                                            <option value="0" {{ $productLink->is_active == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
