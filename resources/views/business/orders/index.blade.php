@include('business.layouts.head')

@include('business.layouts.header')



<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">

                @include('business.layouts.sidebar')

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Orders</h3>

                            <ul class="order-list list-unstyled">
                                @foreach($myOrders as $order)
                                @php
                                dd($order);
                               $product=$order->product?? "";
                                $url='http://127.0.0.1:8000/'.$product->productImage->imageUrl ;


                                @endphp
                                <li class="list-item">
                                    <a href="/hapiverse/public/orderDetail/{{$order->orderId}}">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{$url}}" alt="" class="product-img">
                                                <div>
                                                    <h3 class="product-title">{{$order->product->productName ?? ''}} <span>X 1</span></h3>
                                                    <p class="lead">24-Dec-2022</p>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <h3 class="price">${{$order->product->productPrice ?? ''}}</h3>
                                                <h3 class="status pending">{{$order->product->orderStatus}}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>



@include('user-web.layouts.footer')