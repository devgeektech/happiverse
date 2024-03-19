@php

$user=Auth::user() ?? "";

$userDetail=$user->getUserDetail??"";

@endphp

@include('user-web.layouts.head')

@include('user-web.layouts.header')



<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">

                @include('user-web.layouts.sidebar')
                <div class="col-lg-6 ">
                    <div class="card">
                        <div class="card-body"> 
                            <h3 class="card-title">HapiMart</h3>
                            <div class="row">
                                @foreach($products as $product)
                                @php
                                
                                $url='http://127.0.0.1:8000/'.$product->productImage->imageUrl??'' ;
                                @endphp
                               
                                
                                
                                    @php 
                                    if(Auth::user()->userTypeId==1){$route='/hapiverse/public/product-detail/'.$product->productId;}else{$route='/hapiverse/public/orderDetail/'.$order->orderId;}
                                    @endphp
                                <div class="col-lg-4">
                                    <a href="{{$route}}">
                                        
                                    <div class="card product-card border">
                                        <img src="{{$url}}" alt=""  class="card-img">
                                        <div class = "card-body">
                                            <h3 class="card-title">{{$product->productName ?? ''}} </h3>
                                            <p class="price mb-0">${{$product->productPrice}}</p>
                                        </div>
                                    </div>
                                            
                                        
                                    </a>
                                </div>
                                @endforeach
                                  
                        </div>            
                    </div>
                </div>

            </div>

        </div>

    </section>

</div>



@include('user-web.layouts.footer')