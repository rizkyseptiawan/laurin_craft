<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Travroom') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('back/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet">
    <link href="{{ asset('back/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="/">
                <img src="{{ asset('images/home/logo.png') }}" class="navbar-brand-img" alt="...">
            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('back/img/theme/team-1-800x800.jpg') }}">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="/">
                                <img src="{{ asset('images/home/logo.png') }}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user.dashboard' ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
                            <i class="ni ni-shop text-red"></i> Dashboard
                        </a>
                    </li>
                    @role('Admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user.products.index' ? 'active' : '' }}" href="{{ route('user.products.index') }}">
                            <i class="ni ni-shop text-red"></i> Produk
                        </a>
                    </li>
                    @endrole
                    @role('Admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user.categories.index' ? 'active' : '' }}" href="{{ route('user.categories.index') }}">
                            <i class="ni ni-tag text-yellow"></i> Kategori
                        </a>
                    </li>
                    @endrole
                    @role('Admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user.product-link.index' ? 'active' : '' }}" href="{{ route('user.product-link.index') }}">
                            <i class="ni ni-money-coins text-info"></i> Link Produk
                        </a>
                    </li>
                    @endrole
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user.order.list' ? 'active' : '' }}" href="{{ route('user.orders.list') }}">
                            <i class="ni ni-money-coins text-info"></i> Pesanan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/">Beranda</a>

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="" src="{{ asset('back/img/theme/team-4-800x800.jpg') }}">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Selamat Datang!</h6>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="header bg-gradient-primary pb-8 pt-3 pt-md-6"></div>
        <div class="container-fluid mt--7">
            <!-- Main Content -->
            @yield('content')

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
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
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

            {!! Form::open(['route' => 'logout', 'id' => 'logout-form', 'style' => 'display: none;']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    {{-- Core --}}
    <script src="{{ asset('back/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('back/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Optional JS --}}
    @yield('custom_script')
    {{-- Argon JS --}}
    <script src="{{ asset('back/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
</body>

</html>
