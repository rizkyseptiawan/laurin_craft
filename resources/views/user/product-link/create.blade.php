@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tambah Link Produk</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('partials.flash')
                    {!! Form::open(['route' => ['user.product-link.store', $product]]) !!}
                        <h6 class="heading-small text-muted mb-4">Informasi Link Produk - {{ $product->name }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-produk">Nama Marketplace</label>
                                        <input type="text" id="input-produk" name="name" class="form-control form-control-alternative" placeholder="Nama Marketplace">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-harga">Harga pada Marketplace</label>
                                        <input name="price" type="text" id="input-harga" class="form-control form-control-alternative" placeholder="Contoh :  70000">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-url">Url</label>
                                        <input type="text" name="url" id="input-url" class="form-control form-control-alternative" placeholder="Url">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-active">Status</label>
                                        <select id="input-active" class="form-control form-control-alternative" name="active">
                                            <option value="0">Aktif</option>
                                            <option value="1">Tidak Aktif</option>
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
