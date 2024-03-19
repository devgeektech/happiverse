@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif



<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif

                <div class="col-lg-6">
                    @if(Auth::user()->userTypeId==2)
                    <div class="card">
                        <ul class="nav nav-tabs nav-tabs-s2 gap-2 border-0 mt-4 mb-0 justify-content-center justify-content-md-start" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="que-tab" data-bs-toggle="tab" data-bs-target="#que-tab-pane" type="button" role="tab" aria-controls="que-tab-pane" aria-selected="true"><i class="fas fa-window-restore me-2"></i>In Que</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped-tab-pane" type="button" role="tab" aria-controls="shipped-tab-pane" aria-selected="true"><i class="fas fa-camera-retro me-2"></i>Shipped</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered-tab-pane" type="button" role="tab" aria-controls="delivered-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-video me-2"></i>Delivered</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled-tab-pane" type="button" role="tab" aria-controls="cancelled-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-user-friends me-2"></i>Cancelled</button>
                            </li>
                        </ul>
                    </div>    
                    @endif        
                    @if(Auth::user()->userTypeId==1)<div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Orders</h3>

                            <ul class="order-list list-unstyled">
                                @foreach($myOrders as $order)
                                @php
                                if(is_array($order->businessPImages)){
                                    $url='http://127.0.0.1:8000/'.$order->businessPImages[0];
                                }else{
                                    $url='http://127.0.0.1:8000/'.$order->businessPImages;
                                }
                                


                                @endphp
                                <li class="list-item">
                                    @php 
                                    if(Auth::user()->userTypeId==1){$route='/hapiverse/public/orders/'.$order->orderId;}else{$route='/hapiverse/public/orderDetail/'.$order->orderId;}
                                    @endphp
                                    
                                    <a href="{{$route}}">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{$url}}" alt="" class="product-img">
                                                <div>
                                                    <h3 class="product-title">{{$order->product->productName ?? ''}} <span>X 1</span></h3>
                                                    <p class="lead">24-Dec-2022</p>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <h3 class="price">${{$order->totalAmount ?? ''}}</h3>
                                                <h3 class="status pending">{{$order->order_status_text}}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>@endif
                    @if(Auth::user()->userTypeId==2)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="que-tab-pane" role="tabpanel" aria-labelledby="que-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">In Que Orders</h3>
        
                                    <ul class="order-list list-unstyled">
                                        @foreach($myOrders as $order)
                                        @php
                                        if(is_array($order->businessPImages)){
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages[0];
                                        }else{
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages;
                                        }
                                        @endphp
                                        @if($order->orderStatus==0)
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
                                                        <h3 class="price">${{$order->totalAmount ?? ''}}</h3>
                                                        <h3 class="status pending">{{$order->order_status_text}}</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
        
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="shipped-tab-pane" role="tabpanel" aria-labelledby="shipped-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Shipped Orders</h3>
        
                                    <ul class="order-list list-unstyled">
                                        @foreach($myOrders as $order)
                                        @php
                                        if(is_array($order->businessPImages)){
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages[0];
                                        }else{
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages;
                                        }
                                        @endphp
                                        @if($order->orderStatus==1)
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
                                                        <h3 class="price">${{$order->totalAmount ?? ''}}</h3>
                                                        <h3 class="status pending">{{$order->order_status_text}}</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
        
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delivered-tab-pane" role="tabpanel" aria-labelledby="delivered-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Delivered Orders</h3>
        
                                    <ul class="order-list list-unstyled">
                                        @foreach($myOrders as $order)
                                        @php
                                        if(is_array($order->businessPImages)){
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages[0];
                                        }else{
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages;
                                        }
                                        @endphp
                                        @if($order->orderStatus==2)
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
                                                        <h3 class="price">${{$order->totalAmount ?? ''}}</h3>
                                                        <h3 class="status pending">{{$order->order_status_text}}</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
        
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cancelled-tab-pane" role="tabpanel" aria-labelledby="cancelled-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Cancelled Orders</h3>
        
                                    <ul class="order-list list-unstyled">
                                        @foreach($myOrders as $order)
                                        @php
                                        if(is_array($order->businessPImages)){
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages[0];
                                        }else{
                                            $url='http://127.0.0.1:8000/'.$order->businessPImages;
                                        }
                                        @endphp
                                        @if($order->orderStatus==3)
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
                                                        <h3 class="price">${{$order->totalAmount ?? ''}}</h3>
                                                        <h3 class="status pending">{{$order->order_status_text}}</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
        
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </section>

</div>

  @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.footer')
                @else
                    @include('business.layouts.footer')
                    @endif

