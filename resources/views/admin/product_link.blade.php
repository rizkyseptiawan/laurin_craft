@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Tabel Link Produk</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Marketplace</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productLink as $item)
                        <tr>
                            <td>
                                <div class="media align-items-center">
                                    <a href="#" class="avatar rounded-circle mr-3">
                                        <img alt="" src="{{ asset('images/'.$item->product->image_path) }}">
                                    </a>
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{ $item->product->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item"
                                            href="{{ route('user.link.edit', ['id' => $item->id ,'linkId' => $item->product->id ]) }}">Edit</a>
                                        <a class="dropdown-item" href="#">Lihat</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                {!! $productLink->links('partials.pagination') !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_script')
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('back/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
@endsection
