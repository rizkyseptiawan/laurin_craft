@extends('layouts.admin')
@section('content')
<div class="container-fluid mt--7">
    <!-- Table -->
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
                    <form method="POST" action="{{ route('product.update', $product) }}">
                        @csrf
                        @method('PATCH')
                        <h6 class="heading-small text-muted mb-4">Informasi Produk</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-produk">Nama Produk</label>
                                        <input type="text" id="input-produk" name="name"
                                            class="form-control form-control-alternative" placeholder="Nama Produk"
                                            value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-harga">Harga Umum</label>
                                        <input name="general_price" type="text" id="input-harga"
                                            class="form-control form-control-alternative" placeholder="Contoh :  70000"
                                            value="{{ $product->general_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-deskripsi">Deskripsi</label>
                                        <input type="text" name="description" id="input-deskripsi"
                                            class="form-control form-control-alternative" placeholder="Deskripsi"
                                            value="{{ empty($product->description) ? '' : $product->description }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-category">Kategori</label>
                                        <select id="input-category" class="form-control form-control-alternative"
                                            name="category">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-deskripsi">Slug</label>
                                        <input type="text" name="slug" id="input-deskripsi"
                                            class="form-control form-control-alternative" placeholder="Slug"
                                            value="{{ $product->slug }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-deskripsi">Gambar</label>
                                        <input type="text" name="image_path" id="input-deskripsi"
                                            class="form-control form-control-alternative" placeholder="Nama Gambar"
                                            value="{{ $product->image_path }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    © 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative
                        Tim</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                            class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>

@endsection
@section('custom_script')
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
@endsection
