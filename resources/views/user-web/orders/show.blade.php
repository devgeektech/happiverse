@include('user-web.layouts.head')

@include('user-web.layouts.header')



<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">

                @include('user-web.layouts.sidebar')

                <div class="col-lg-6 ">

                <a href="">

                    <div class="card order-card">

                        <img src="{{'http://127.0.0.1:8000/'.$orderById->product->productImage->imageUrl ?? ''}}" class="card-img" alt="...">

                        <div class="card-body">

                            <h5 class="card-title">{{$orderById->product->productName}}</h5>
                            <h5 class="card-title">${{$orderById->product->productPrice}}</h5>
                            <p class="card-text">

                                @if($orderById->orderStatus==0)

                                <span style="color: #ffa500;" class="margin-s">Pending</span>

                                @elseif($orderById->orderStatus==1)

                                <span style="color: #00a1ff;"  class="margin-s">Shipped</span>

                                @elseif($orderById->orderStatus==2)

                                <span style="color: #008000;" class="margin-s">Delivered</span>

                                @elseif($orderById->orderStatus==3)

                                <span style="color: #ff0000;" class="margin-s">Cancelled</span>

                                @endif

                                <br>

                                Address:<span>{{$orderById->shippingAddress}}</span>

                            </p>

                            <p class="card-text"><small class="text-muted">Id:{{$orderById->orderId}}</small></p>

                        </div>

                    </div>

                </a>

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