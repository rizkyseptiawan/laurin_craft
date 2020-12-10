@extends('layouts.user')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Tabel Order</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Pembeli</th>
                            <th scope="col">Status</th>
                            <th scope="col">No Resi</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>
                                <span class="badge badge-{{ $order->status == 'Dibayar' ? 'success' : 'warning'}}">{{ $order->status }}</span></td>
                            <td>{{ $order->receipt_number }}</td>
                            <td>
                               {{ $order->address }}
                           </td>
                                <td>{{ $order->total }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" target="_blank" href="{{ $order->external_invoice_link }}">Lihat</a>
                                        @role('Admin')
                                        <a class="dropdown-item" target="_blank" href="{{ route('user.orders.edit.receipt', $order->id) }}">Perbarui Resi</a>
                                        @endrole
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                {!! $orders->links('partials.pagination') !!}
            </div>
        </div>
    </div>
</div>
@endsection
