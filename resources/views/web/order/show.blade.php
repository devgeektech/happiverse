@php
$user=Auth::user();
$userDetail=$user->getUserDetail ?? '';
@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')


<section class="custom-section">
    @include('home.short-cuts')
    <div class="container-fluid">
        <div class="row" id="page-contents">
            <div class="col-xxl-4 col-lg-6 col-md-8 offset-xxl-4 offset-lg-3 offset-md-2">
                <a href="">
                    <div class="card order-card">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{asset($orderById->product->productImage->imageUrl)}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">{{$orderById->product->productName}}</h5>
                                    <p class="card-text">
                                        @if($orderById->orderStatus==0)
                                        <span class="margin-s">Pending</span>
                                        @elseif($orderById->orderStatus==1)
                                        <span class="margin-s">Shipped</span>
                                        @elseif($orderById->orderStatus==2)
                                        <span class="margin-s">Delivered</span>
                                        @elseif($orderById->orderStatus==3)
                                        <span class="margin-s">Cancelled</span>
                                        @endif
                                        <br>
                                        Address:<span>{{$orderById->shippingAddress}}</span>
                                    </p>
                                    <p class="card-text"><small class="text-muted">Id:{{$orderById->orderId}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <div class="card sticy-card">
                    <div class="card-body">
                        <h4 class="card-title">Help</h4>
                        <p class="card-text">Let us know the reason of cancelling this order?</p>
                        <div class="d-flex flex-wrap mb-3 gap-2">
                            <a href="" class="btn btn-light">Cancelling my self</a>
                            <a href="" class="btn btn-light">Quantity is wrong</a>
                            <a href="" class="btn btn-light">Order placed by mistake</a>
                            <a href="" class="btn btn-light">Other</a>
                        </div>
                        <a href="" class="btn btn-danger">Cancel Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('web.layouts.footer')
