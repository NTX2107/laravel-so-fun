<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home')}}"
                               class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="{{route('show.all.products')}}"
                               class="{{ Route::currentRouteNamed('show.all.products') ? 'active' : '' }}">Listing</a>
                        </li>
                        <li><a href="#">Contact Us</a></li>
                        <li style="display: flex">
                            @guest('web')
                                <div style="padding-left: 20px" class="main-white-button"><a
                                        href="#"><i
                                            class="fa fa-plus"></i>Register</a></div>
                                <div style="padding-left: 20px" class="main-white-button"><a
                                        href="{{route('show.login')}}"><i
                                            class="fa fa-plus"></i>Login</a></div>
                            @endguest
                            @auth('web')
                                <div style="padding-left: 20px" class="main-white-button"><a
                                        href="{{route('auth.logout')}}"><i
                                            class="fa fa-plus"></i>Logout</a></div>
                                <div style="padding-left: 20px" class="main-white-button"><a
                                        href="{{route('auth.logout')}}"><i
                                            class="fa fa-plus"></i>Logout</a></div>
                            @endif
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
