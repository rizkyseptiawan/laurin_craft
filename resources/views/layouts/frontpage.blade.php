
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LaurinCraft - @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>

<body>
    @include('front.partials.header')

    @yield('slider')

    @php
        $withSidebar = $withSidebar ?? false;
    @endphp

    @if ($withSidebar)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Kategori</h2>
                            <div class="panel-group category-products" id="accordian">
                                @foreach ($categories as $category)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a>{{ $category->name }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </section>
    @else
        <section>
            <div class="container">
                @yield('content')
            </div>
        </section>
    @endif

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="companyinfo">
                            <h2><span>Laurin</span>-craft</h2>
                            <p>LaurinCraft merupakan produk kerajinan yang berasal dari tempurung kelapa</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{ asset('images/home/map.png') }}" alt="" />
                            <p>Bondowoso, Jawa Timur, Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2020 LaurinCraft. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>

    <script>
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        window.axios.defaults.headers.common['Accept'] = 'application/json';
        window.axios.defaults.headers.common['Content-Type'] = 'application/json';

        function addToCart(e) {
            e.preventDefault();
            const me = e.target;
            axios.post("{{ route('frontpage.cart') }}", {
                    action: 'add',
                    items: {
                        id: me.getAttribute('data-id'),
                        qty: me.getAttribute('data-qty')
                    }
                })
                .then(res => {
                    me.removeEventListener('click', addToCart);
                    me.innerHTML = '<i class="fa fa-shopping-cart"></i> Lihat Keranjang';
                    me.classList.remove('add-to-cart');
                    me.href = "{{ route('frontpage.cart') }}";
                })
                .catch(err => {
                    alert('Terjadi kesalahan! Halaman akan dimuat ulang');
                    window.location.reload();
                });
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.add-to-cart').forEach(c => {
                c.addEventListener('click', addToCart);
            });
        });
    </script>

    @stack('js')
</body>
</html>
