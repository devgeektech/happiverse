@php
$user=Auth::user();
$userDetail=$user->getUserDetail ?? '';
$images=$userDetail->postImages;
@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')


<section>

    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        @include('home.short-cuts')
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-5">Orders</h4>
                                    <div class="row">
                                        @foreach($myOrders as $order)
                                        <div class="col-lg-4">
                                            <a href="{{url('orders/'.$order->orderId)}}">
                                                <div class="card product-card">
                                                    <img src="{{asset($order->product->productImage[0]->imageUrl ?? '')}}" alt="" class="card-img">
                                                    <div class="card-img-overlay">
                                                        <div class="card-title">{{$order->product->productName}}</div>
                                                        <div class="card-title">{{$order->product->productUrl}}</div>
                                                        <p class="price">${{$order->product->productPrice}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!-- centerl meta -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('web.layouts.footer')