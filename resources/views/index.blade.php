<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Plot Listing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-plot-listing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <!--

    TemplateMo 564 Plot Listing

    https://templatemo.com/tm-564-plot-listing

    -->
</head>

<body>
{{--@if(session('success'))--}}
{{--    <div class="toast" data-autohide="false">--}}
{{--        <div class="toast-header">--}}
{{--            <strong class="mr-auto text-primary">Toast Header</strong>--}}
{{--            <small class="text-muted">5 mins ago</small>--}}
{{--            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>--}}
{{--        </div>--}}
{{--        <div class="toast-body">--}}
{{--            Some text inside the toast body--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home')}}"
                               class="{{ Route::currentRouteNamed('home') ? 'active' : '' }}">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#" class="{{ Route::currentRouteNamed('show.all.products') ? 'active' : '' }}">Listing</a>
                        </li>
                        <li><a href="#">Contact Us</a></li>
                        <li>
                            <div class="main-white-button"><a href="{{route('show.create.product')}}"><i
                                        class="fa fa-plus"></i> Add Your Product</a></div>
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
<!-- ***** Header Area End ***** -->

<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="top-text header-text">
                    <h6>Check Out Our Products</h6>
                    <h2>Product Listings of Different Categories</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="listing-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="naccs">
                    <div class="grid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="menu">
                                    @for($i = 0; $i < count($categories); $i++)
                                        <div @if($i == 0) class="first-thumb active"
                                             @elseif($i == count($categories) - 1) class="last-thumb" @endif>
                                            <div class="thumb">
                                                <span class="icon"><img src="{{$categories[$i]->thumbnail}}"
                                                                        alt="{{$categories[$i]->code}}"></span>
                                                {{$categories[$i]->name}}
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <ul class="nacc">
                                    @foreach($categories as $category)
                                        <li @if(current($categories) == $categories[0]) class="active" @endif>
                                            <div>
                                                <div class="col-lg-12">
                                                    <div class="owl-carousel owl-listing">
                                                        @for($i = 0; $i < count($category->childProducts); $i+=3)
                                                            <div class="item">
                                                                <div class="row">
                                                                    {{generateViewProduct($category->childProducts[$i])}}
{{--                                                                    {{generateViewProduct($category->childProducts[$i+1])}}--}}
{{--                                                                    {{generateViewProduct($category->childProducts[$i+2])}}--}}
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="about">
                    <div class="logo">
                        <img src="assets/images/black-logo.png" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adicingi elit, sed do eiusmod tempor incididunt ut et
                        dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="helpful-links">
                    <h4>Helpful Links</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">Listing</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Awards</a></li>
                                <li><a href="#">Useful Sites</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-us">
                    <h4>Contact Us</h4>
                    <p>27th Street of New Town, Digital Villa</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">010-020-0340</a>
                        </div>
                        <div class="col-lg-6">
                            <a href="#">090-080-0760</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sub-footer">
                    <p>Copyright © 2021 Plot Listing Co., Ltd. All Rights Reserved.
                        <br>
                        Design: <a rel="nofollow" href="https://templatemo.com" title="CSS Templates">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
<!-- Scripts -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/animation.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.toast').toast('show');
    });
</script>

</html>
