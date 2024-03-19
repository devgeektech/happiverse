@php
use App\Models\MstUser;
$user=MstUser::where('userId',$orderById->userId)->first();
$userName=$user->userName;
$user=Auth::user() ?? "";
$businessDetail=$user->getBusinessDetail??"";
$workingHours=$businessDetail->workingHours ??"";
$products=$businessDetail->businessProduct ??"";
@endphp

@include('business.layouts.head')
@include('business.layouts.header')
    <div class="main-content" style="margin-top: 59.1094px;">
        <section class="home">
            <div class="container">
                <div class="row">
                    @include('business.layouts.sidebar')
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Order Detail</h3>
                                <ul class="order-list">
                                    <div class="list-item">
                                        <a href="">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src= "{{'http://127.0.0.1:8000/'.$orderById->product->productImage->imageUrl}}"  alt="" class="product-img">
                                                    <div>
                                                        <h3 class="product-title">{{ $orderById->product->productName}}<span>X 1</span></h3>
                                                        <p class="lead">{{date('d-M-Y h:i A',strtotime($orderById->addDate))}}</p>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <h3 class="price">{{ $orderById->product->productPrice ?? ''}}</h3>
                                                    <h3 class="status pending">{{$orderById->product->orderStatus}}</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="card order-card">
                            
                            <img src="{{'http://127.0.0.1:8000/'.$orderById->product->productImage->imageUrl}}" alt="" class="card-img">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <h3 class="card-title">{{$orderById->product->productName}}</h3>
                                        <p class="lead">Order no: #{{$orderById->orderNo}}</p>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="title-s2">{{ $orderById->product->productPrice ?? ''}}</h3>
                                        <h3 class="status pending">{{$orderById->product->orderStatus}}</h3>
                                    </div>
                                </div>
                                <p class="lead">Order id: #{{$orderById->orderNo}}</p>
                                <p class="lead">Order from: {{$userName}}</p>
                                <p class="lead">Delivery address: {{$orderById->shippingAddress}}</p>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="lead">Quantity: 1</p>
                                    <h4 class="title-s2">{{$orderById->product->productPrice ?? ''}}</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="lead"><b>Subtotal</b></p>
                                    <h4 class="title-s2">{{$orderById->orderCost ?? ''}}</h4>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="lead">Shipping fee</p>
                                    <h4 class="title-s2">${{$orderById->shippingCost}}</h4>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="title-s2">Total (Incl.GST)</p>
                                    <h4 class="title-s2">{{$orderById->totalAmount ?? ''}}</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    @if($orderById->orderStatus==0)
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Help</h4>
                                <p class="card-text">Let us know the reason of cancelling this order?</p>
                                <div class="d-flex flex-wrap mb-3 gap-2">
                                    <a href="" class="btn btn-light">Cancelling my self</a>
                                    <a href="" class="btn btn-light">Quantity is wrong</a>
                                    <a href="" class="btn btn-light">Order placed by mistake</a>
                                    <a href="" class="btn btn-light">Other</a>
                                </div>
                                <a href="{{url('cancel-order/'.$orderById->orderId)}}" class="btn btn-danger">Cancel Order</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@include('user-web.layouts.footer')    