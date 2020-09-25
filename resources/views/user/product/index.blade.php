@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Tabel Produk</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('user.products.create') }}" class="btn btn-sm btn-primary">Tambah Produk</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>
                                <div class="media align-items-center">
                                    <a class="avatar rounded-circle mr-3">
                                        <img src="{{ $item->image_link }}">
                                    </a>
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{$item->name}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>Rp. {{ $item->general_price }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('user.products.edit', $item) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('frontpage.product.detail', $item) }}">Lihat</a>
                                        <a class="dropdown-item" href="{{ route('user.product-link.create', $item) }}">Tambah Link Produk</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                {!! $products->links('partials.pagination') !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_script')
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
@endsection
