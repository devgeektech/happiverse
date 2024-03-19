@include('user-web.layouts.head')
@include('user-web.layouts.header')
<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row">
                @include('user-web.layouts.sidebar')
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Item</div>
                            <ul class="order-list list-unstyled">
                              
                                <li class="list-item">
                                    
                                        <div class="d-flex align-items-center ">
                                             @forelse($productImages as $productImage)
                                            <div class = "col-md-2">
                                                <img src="{{ 'http://127.0.0.1:8000/'.$productImage->imageUrl }}" alt="" class="card-img">
                                            </div>
                                            @empty
                                            
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=684&q=80" alt="" class="product-img">
                                            </div>
                                            @endforelse
                                            <div class = "card-body">
                                                    <h3 class="card-title">{{$product->productName}}<span>X 1</span>
                                                        <span  class="d-flex justify-content-end">
                                                            <h3 class="price">${{$product->productPrice ?? ''}}</h3>
                                                            <h3 class="status pending">{{$product->orderStatus}}</h3>
                                                        </span>
                                                    
                                                    </h3>
                                                    
                                            </div>
                                        </div>
                                            
                                        
                                 
                                </li>
                                
                               
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">Shipping Adress</div>
                                              <div id = "map" style ="  top: 0; bottom: 0; width: 100% ;height:300px; "></div>
                                         
                                               
                                        </div>
                                    </div>
                               
                                    
                                   
                                    
                                       
                                   
                              
                                    
                
                
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">Order Summary</div>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="lead">Quantity: 1</p>
                                                    <span >${{$product->productPrice ?? ''}}</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="lead"><b>Subtotal</b></p>
                                                    <span class="title-s2">${{$product->productPrice ?? ''}}</span>
                                                </div>
                                                <hr>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="lead">Shipping fee</p>
                                                    <span class="title-s2">${{$product->productPrice ?? ''}}</h4>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <p class="title-s2">Total (Incl.GST)</p>
                                                    <span class="">${{$product->productPrice ?? ''}}</h4>
                                                </div>
                                            </div>
                                                   
                                        </div>
                                        
                                    </div>
                                    <form method = "post" action = "{{route('orders.place',[$product->productId])}}">
                                        @csrf
                                        <input type= hidden name = "product_price" value = "{{$product->productPrice }}">
                                        <input type= hidden name = "product_Name"  value = "{{$product->Name }}">
                                        <input type= hidden name = "product_businessId" value = "{{$product->businessId }}">
                                        <button type ="submit" class="btn btn-light">Buy Now</button>
                                    </form>
                                     
                                  
                            </ul>   
                            
                              
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
            </div>
        </div>
    </section>
</div>

@include('user-web.layouts.footer')