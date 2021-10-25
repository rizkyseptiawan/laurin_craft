@extends('layouts.user')
@section('content')
<div class="row">
    <div class="col">
        <div class="card" >
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="mb-0">Sistem Prediksi</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body"  style="background-color: none">
            <div class="row row-example">
                <div class="col-xs-12 col-md-6" style="background-color:#FF9200; border-radius:calc(0.375rem - 1px) calc(0.375rem - 1px) 0 0;">
                    <h2 class="text-center text-white m-4">Prediksi Penjualan</h2>
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-0 text-center">Hasil Prediksi</h3>
                                </div>
                            </div>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>September</p>
                                        </td>
                                        <td>
                                            <p>2021</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-bold">{{ number_format(10000) }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card-body text-white" style="background-color:none">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fermentum tempor enim egestas eu, nec tristique a. Elementum tempor etiam mattis ipsum ullamcorper dignissim. Id libero sollicitudin pretium eu nibh ut. Eleifend fermentum integer velit egestas vivamus semper gravida. 

                            Phasellus risus, luctus faucibus sollicitudin a eu nunc, pretium. Lorem nisi, sit lectus non dui ipsum. Cursus egestas leo ac sit penatibus phasellus dictumst dictumst. Netus tincidunt egestas ultricies interdum pretium ut. Urna, condimentum risus aenean amet viverra senectus viverra est. Nulla vitae nunc convallis duis nulla pretium enim, sed faucibus. Nisl at consequat, aenean odio. 
                            
                            Phasellus risus, luctus faucibus sollicitudin a eu nunc, pretium. Lorem nisi, sit lectus non dui ipsum. Cursus egestas leo ac sit penatibus phasellus dictumst dictumst. Netus tincidunt egestas ultricies interdum pretium ut. Urna, condimentum risus aenean amet viverra senectus viverra est. Nulla vitae nunc convallis duis nulla pretium enim, sed faucibus. Nisl at consequat, aenean odio. </p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <h2 class="text-center m-4">Kalkulator</h2>
                    <br>
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="month-input">Bulan</label>
                                    <input class="form-control" type="month" value="2021-11" id="month-input" placeholder="Masukkan bulan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="year-input">Tahun</label>
                                    <input class="form-control" type="text" placeholder="Masukkan tahun" id="year-input">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="file">Data Penjualan</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" lang="en">
                                <label class="custom-file-label" for="file">Masukkan data</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="result">Hasil Prediksi</label>
                            <input type="text" class="form-control" id="result" name="result" placeholder="Hasil prediksi akan tampil disini" readonly>
                        </div>
                        {{-- <button class="btn btn-block" type="submit" style="background-color:#FF9200">Hasil</button> --}}
                        {{-- <a href="#" onclick="Random()">
                            <button class="btn btn-block" style="background-color:#FF9200">Hasil</button>
                        </a> --}}
                    </form>
                    <button class="btn btn-block" onclick="Random()" style="background-color:#FF9200">Hasil</button>
                    <br>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="text-left">September</p>
                                    </td>
                                    <td>
                                        <p class="text-center">2021</p>
                                    </td>
                                    <td>
                                        <p class="font-weight-bold text-right">{{ number_format(10000) }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function Random() {
        var rnd = Math.floor(Math.random() * 10000);
        document.getElementById('result').value = rnd;
    }
</script>
