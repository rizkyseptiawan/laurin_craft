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
                            <h3 class="mb-0">Edit Link Produk</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger " role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($alert = Session::get('alert'))
                    <div class="alert alert-{{ $alert['type']}} " role="alert">
                        {{ $alert['message']}}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('user.link.update',['id'=> $product->id ,'linkId' => $productLinks->id ] ) }}">
                        @csrf
                        @method('PATCH')
                        <h6 class="heading-small text-muted mb-4">Informasi Link Produk - {{ $product->name }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-produk">Nama Marketplace</label>
                                        <input type="text" id="input-produk" name="name"
                                            class="form-control form-control-alternative" placeholder="Nama Marketplace" value="{{ $productLinks->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-harga">Harga pada Marketplace</label>
                                        <input name="price" type="text" id="input-harga"
                                            class="form-control form-control-alternative" placeholder="Contoh :  70000" value="{{ $productLinks->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-url">Url</label>
                                        <input type="text" name="url" id="input-url"
                                            class="form-control form-control-alternative" placeholder="Url" value="{{ $productLinks->url }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-active">Status Aktif</label>
                                        <select id="input-active" class="form-control form-control-alternative"
                                            name="active">
                                            <option value="">Pilih Status</option>
                                            <option value="1" {{ $productLinks->is_active == 1 ? 'selected' : ''}}>Aktif</option>
                                            <option value="0" {{ $productLinks->is_active == 0 ? 'selected' : ''}}>Tidak Aktif</option>

                                        </select>

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
