@extends('layouts.main.master')
@section('title')
    Shopping
@endsection
@section('customStyle')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-plot-listing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
@endsection
@section('bannerTitle')
    Check Out Our Products
@endsection
@section('bannerContent')
    Product Listings of Different Categories
@endsection
@section('content')
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
                                            <li @if($category == $categories[0]) class="active" @endif>
                                                <div>
                                                    <div class="col-lg-12">
                                                        <div class="owl-carousel owl-listing">
                                                            <div class="items">
                                                                <div class="row">
                                                                    @foreach($category->childProducts as $product)
                                                                        <div class="col-lg-12">
                                                                            <div class="listing-item">
                                                                                <div class="left-image">
                                                                                    <a href="#"><img
                                                                                            src="{{$product->images}}"
                                                                                            alt=""></a>
                                                                                    <div class="hover-content">
                                                                                        <div class="main-white-button">
                                                                                            <a href="{{route('show.product', $product->id)}}"><i
                                                                                                    class="fa fa-eye"></i>
                                                                                                See Detail</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="right-content align-self-center">
                                                                                    <a href="#"><h4>{{$product->name}}</h4></a>
                                                                                    <h6>by: ADMIN</h6>
                                                                                    <span class="price"><div class="icon"><img
                                                                                                src="{{asset('assets/images/listing-icon-01.png')}}"
                                                                                                alt=""></div> {{$product->price}}</span>
                                                                                    <span class="details">Details: <em>{{$product->detail}}</em></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
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
@endsection
