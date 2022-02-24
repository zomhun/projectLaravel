<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <!-- start header top left -->
                        <div class="aa-header-top-left">
                            <!-- start language -->
                            <div class="aa-language">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <img src="{{ URL::asset('public/assets/img/flag/english.jpg') }}"
                                            alt="english flag">ENGLISH
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#"><img src="{{ URL::asset('public/assets/img/flag/french.jpg') }}"
                                                    alt="">FRENCH</a></li>
                                        <li><a href="#"><img
                                                    src="{{ URL::asset('public/assets/img/flag/english.jpg') }}"
                                                    alt="">ENGLISH</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- / language -->

                            <!-- start currency -->
                            <div class="aa-currency">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-usd"></i>USD
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                                        <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- / currency -->
                            <!-- start cellphone -->
                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-phone"></span>00-62-658-658</p>
                            </div>
                            <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
                        <div class="aa-header-top-right">
                            <ul class="aa-head-top-nav-right">
                                <li><a href="account.html">My Account</a></li>
                                <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li>
                                <li class="hidden-xs"><a href="cart.html">My Cart</a></li>
                                <li class="hidden-xs"><a href="checkout.html">Checkout</a></li>
                                @if(Auth::guard('cus')->check())
                                <li class="nav-item">
                                    <a class="nav-link" href="#pablo">
                                        <span class="no-icon">Hi, {{Auth::guard('cus')->user()->name}}</span>
                                    </a>
                                </li>
                                <li><a href="{{route('customer.logout')}}">Logout</a></li>
                                @else
                                <li><a href="{{route('customer.login')}}">Login</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                            <!-- Text based logo -->
                            <a href="index.html">
                                <span class="fa fa-shopping-cart"></span>
                                <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                            </a>
                            <!-- img based logo -->
                            <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                        </div>
                        <!-- / logo  -->
                        <!-- cart box -->
                        <div class="aa-cartbox">
                            <a class="aa-cart-link" href="{{route('cart.view')}}">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">SHOPPING CART</span>
                                <span class="aa-cart-notify">{{number_format($totalqtt)}}</span>
                            </a>
                            <div class="aa-cartbox-summary">
                                <ul>
                                    @foreach($carts as $cart)
                                    <li>
                                        <a class="aa-cartbox-img" href="#"><img
                                                src="{{ URL::asset('public/images/') }}/{{$cart->image}}"
                                                alt="img"></a>
                                        <div class="aa-cartbox-info">
                                            <h4><a href="#">{{ $cart->name }}</a></h4>
                                            <p>{{ $cart->quantity }} x {{ number_format($cart->price) }}VND</p>
                                        </div>
                                        <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                                    </li>
                                    @endforeach
                                    <li>
                                        <span class="aa-cartbox-total-title">
                                            Total
                                        </span>
                                        <span class="aa-cartbox-total-price">
                                        $ {{number_format($totalprice)}}
                                        </span>
                                    </li>
                                </ul>
                                <a class="aa-cartbox-checkout aa-primary-btn" href="{{route('order.checkout')}}">Checkout</a>
                            </div>
                        </div>
                        <!-- / cart box -->
                        <!-- search box -->
                        <div class="aa-search-box">
                            <form action="">
                                <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- / search box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @foreach
                        <li></li>
                        @endforeach
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Digital <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Camera</a></li>
                                <li><a href="#">Mobile</a></li>
                                <li><a href="#">Tablet</a></li>
                                <li><a href="#">Laptop</a></li>
                                <li><a href="#">Accesories</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Furniture</a></li>
                        <li><a href="blog-archive.html">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-archive.html">Blog Style 1</a></li>
                                <li><a href="blog-archive-2.html">Blog Style 2</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                        <li><a href="#">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="product.html">Shop Page</a></li>
                                <li><a href="product-detail.html">Shop Single</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
</section>