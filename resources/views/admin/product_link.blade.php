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
                            <th scope="row">
                                <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                    <img alt="Image placeholder" src="{{asset('images/'.$item->product->image_name)}}">
                                </a>
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$item->product->name}}</span>
                                </div>
                                </div>
                            </th>
                            <td>
                                    {{ $item->name }}
                                </td>

                            <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('user.link.edit',['id'=> $item->id ,'linkId' => $item->product->id ]) }}">Edit</a>
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
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                        </a>
                    </li>
                    </ul>
                </nav>
                </div>
            </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                © 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
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
