@extends('layouts.user')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Masukkan Resi Untuk Transaksi</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('partials.flash')
                {!! Form::open(['method' => 'patch','route' => ['user.orders.update.receipt', $order->id]]) !!}
                    <h6 class="heading-small text-muted mb-4">Resi Transaksi</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-resi">Nomor Resi</label>
                                    <input type="text" id="input-resi" name="receipt_number" class="form-control form-control-alternative" placeholder="Nomor Resi" value="{{ $order->receipt_number }}">
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
