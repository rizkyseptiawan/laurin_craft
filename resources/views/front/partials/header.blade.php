<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +62 81 234 567 891</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> laurincraft@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="/">
                            <img src="{{ asset('images/home/logo.png') }}" alt="" style="width:100%;max-width:139px" />
                        </a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a class="{{ request()->route()->getName() === 'frontpage.cart' ? 'active' : '' }}" href="{{ route('frontpage.cart') }}"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                            @guest
                                <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Masuk</a></li>
                            @else
                                <li><a href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i> Dashboard</a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="{{ request()->route()->getName() === 'frontpage.cart' ? 'active' : '' }}">Beranda</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
