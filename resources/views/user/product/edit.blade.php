@extends('layouts.user')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Update Produk</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('partials.flash')
                    {!! Form::open(['method' => 'patch', 'route' => ['user.products.update', $product], 'files' => true]) !!}
                        <h6 class="heading-small text-muted mb-4">Informasi Produk</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-produk">Nama Produk</label>
                                        <input type="text" id="input-produk" name="name" class="form-control form-control-alternative" placeholder="Nama Produk" value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-harga">Harga Umum</label>
                                        <input name="general_price" type="text" id="input-harga" class="form-control form-control-alternative" placeholder="Contoh :  70000" value="{{ $product->general_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-deskripsi">Deskripsi</label>
                                        <input type="text" name="description" id="input-deskripsi" class="form-control form-control-alternative" placeholder="Deskripsi" value="{{ empty($product->description) ? '' : $product->description }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-category">Kategori</label>
                                        <select id="input-category" class="form-control form-control-alternative" name="category">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $product->category_id) selected @endif>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-deskripsi">Gambar</label>
                                        <img src="{{ $product->image_link }}" class="d-block" style="object-fit:cover;max-width:350px" />
                                        <input type="file" name="image_path" class="form-control form-control-alternative" />
                                        <small>Pilih gambar untuk mengganti gambar produk</small>
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
@section('custom_script')
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
@endsection
