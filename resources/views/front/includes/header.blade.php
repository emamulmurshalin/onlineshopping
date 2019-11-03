<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
                <ul>
                    @if(Session::get('customerId'))
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('customerLogoutForm').submit(); ">Logout</a></li>
                        <form action="{{ url('/customer-logout') }}" method="POST" id="customerLogoutForm">
                            {{ csrf_field() }}
                        </form>
                    @else
                        @if(Session::get('customerId') && Session::get('shippingId'))
                            <li><a href="{{ url('/payment-info') }}">Checkout</a></li>
                        @elseif(Session::get('customerId'))
                            <li><a href="{{ url('/shipping-info') }}">Checkout</a></li>
                        @else
                            <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                        @endif
                    <li><a href="{{ url('/login-form') }}">Login</a></li>
                    <li><a href="{{ url('/register-form') }}"> Create Account </a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{ url('/') }}">New Shop <span>Shop anywhere</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{ url('/') }}" class="act">Home</a></li>
                                <!-- Mega Menu -->
                                @foreach($categories as $category)
                                    <li><a href="{{ url('/product-category/'.$category->id) }}">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="logo-nav-right">
                    <ul class="cd-header-buttons">
                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                    <div id="cd-search" class="cd-search">
                        <form action="#" method="post">
                            <input name="Search" type="search" placeholder="Search...">
                        </form>
                    </div>
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href="checkout.html">
                            <h3> <div>
                                    <span>BDT.{{ Cart::getTotal() }}</span>(<span></span>{{ Cart::getTotalQuantity() }} items)</div>
                                <img src="{{ asset('front') }}/images/bag.png" alt="" />
                            </h3>
                        </a>
                        @if(Cart::isEmpty())
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                        @endif
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--header-->