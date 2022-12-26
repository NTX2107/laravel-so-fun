<?php

function generateViewProduct($product)
{
    return `
        <div class="col-lg-12">
            <div class="listing-item">
                <div class="left-image">
                    <a href="#"><img src="{{$product->images}}" alt=""></a>
                    <div class="hover-content">
                        <div class="main-white-button">
                            <a href="#">
                                <i class="fa fa-eye"></i>
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="right-content align-self-center">
                    <a href="#"><h4>{{$product->name}}</h4></a>
                    <h6>by: ADMIN</h6>
                    <span class="price">
                        <div class="icon"><img src="{{asset('assets/images/listing-01.jpg')}}" alt=""> </div>
                        {{$product->price}} VND
                    </span>
                </div>
            </div>
        </div>`;
}
