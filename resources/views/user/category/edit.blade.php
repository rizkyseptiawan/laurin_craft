@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Edit Kategori</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('partials.flash')
                {!! Form::open(['method' => 'patch', 'route' => ['user.categories.update', $category]]) !!}
                    <h6 class="heading-small text-muted mb-4">Informasi Kategori</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-produk">Nama Kategori</label>
                                    <input type="text" id="input-produk" name="name" class="form-control form-control-alternative" placeholder="Nama Kategori" value="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-slug">Slug</label>
                                    <input name="slug" type="text" id="input-slug" class="form-control form-control-alternative" disabled placeholder="Slug" value="{{ $category->slug }}">
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
