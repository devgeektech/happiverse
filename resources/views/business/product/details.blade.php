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
                            <div class="card-title">{{$product->productName}}</div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card order-card">
                                        <div class="product-img-slider">
                                            @forelse($productImages as $productImage)
                                            <div>
                                                <img src="{{ 'http://127.0.0.1:8000/'.$productImage->imageUrl }}" alt="" class="card-img">
                                            </div>
                                            @empty
                                            
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=684&q=80" alt="" class="card-img">
                                            </div>
                                            @endforelse
                                        </div>
                                        <div>
                                            <h3 class="card-title">Description</h3>
                                            <p class="lead">{{$product->productdescription}}</p>
                                        </div>
                                        <div class="text-end">
                                            <h3 class="title-s2">${{$product->productPrice}}</h3>
                                            <!--<h3 class="status pending">Pending</h3>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('business.layouts.footer')