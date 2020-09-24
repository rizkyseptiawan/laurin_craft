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
                          <h3 class="mb-0">Tabel Produk</h3>
                      </div>
                      <div class="col text-right">
                          <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Tambah Produk</a>
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
                            <th scope="row">
                              <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                  <img alt="Image placeholder" src="{{asset('images/'.$item->image_name)}}">
                                </a>
                                <div class="media-body">
                                  <span class="mb-0 text-sm">{{$item->name}}</span>
                                </div>
                              </div>
                            </th>
                            <td>
                                  {{ $item->description }}
                              </td>
                            <td>
                              Rp. {{ $item->general_price }}
                            </td>

                            <td class="text-right">
                              <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                  <a class="dropdown-item" href="{{ route('product.edit',['id' => $item->id]) }}">Edit</a>
                                  <a class="dropdown-item" href="{{ route('product.show',['id' => $item->id]) }}">Lihat</a>
                                  <a class="dropdown-item" href="{{ route('user.link.create',['id' => $item->id]) }}">Tambah Link Produk</a>
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
