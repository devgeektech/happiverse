@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif
@php
$businessDetail=$loggedIn;
$workingHours=$businessDetail->workingHours ??"";

@endphp
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
                    @if(Auth::user()->userTypeId==1)
                    @include('user-web.event.index')
                @else
                     @include('business.events')
                @endif
                   

                    <div class="tab-content d-none" id="myTabContent">
                        <div class="tab-pane fade show active" id="events-tab-pane" role="tabpanel" aria-labelledby="events-tab" tabindex="0">
                        </div>
                        <div class="tab-pane fade" id="products-tab-pane" role="tabpanel" aria-labelledby="products-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Products</div>
                                    <div class="row">

                                        @foreach($products as $product)

                                        <div class="col-lg-4">
                                            <a href="">
                                                <div class="card product-card">
                                                    <img src="{{asset($product->productImage[0]->imageUrl ?? null) }}" alt="" class="card-img">
                                                    <div class="card-body">
                                                        <h3 class="card-title">{{$product->productName}}</h3>
                                                        <p class="price">${{$product->productPrice}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="friends-tab-pane" role="tabpanel" aria-labelledby="friends-tab" tabindex="0">
                            <div class="card friends-card">
                                <div class="card-body">
                                    <h3 class="card-title">Friends</h3>
                                    <ul class="friends-list">
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="assets/img/png/profile-1.png">
                                                    <div>
                                                        <h3 class="title">Sam Witwicy</h3>
                                                        <p class="lead">1 mutual friend</p>
                                                    </div>
                                                </a>
                                                <a href="" class="btn btn-primary btn-small">Add Friend</a>
                                            </div>
                                        </li>
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="assets/img/png/profile-1.png">
                                                    <div>
                                                        <h3 class="title">Sam Witwicy</h3>
                                                        <p class="lead">1 mutual friend</p>
                                                    </div>
                                                </a>
                                                <a href="" class="btn btn-primary btn-small">Add Friend</a>
                                            </div>
                                        </li>
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="assets/img/png/profile-1.png">
                                                    <div>
                                                        <h3 class="title">Sam Witwicy</h3>
                                                        <p class="lead">1 mutual friend</p>
                                                    </div>
                                                </a>
                                                <a href="" class="btn btn-primary btn-small">Add Friend</a>
                                            </div>
                                        </li>
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="assets/img/png/profile-1.png">
                                                    <div>
                                                        <h3 class="title">Sam Witwicy</h3>
                                                        <p class="lead">1 mutual friend</p>
                                                    </div>
                                                </a>
                                                <a href="" class="btn btn-primary btn-small">Add Friend</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="photos-tab-pane" role="tabpanel" aria-labelledby="photos-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Photos</h3>
                                    <div class="row photos-gallery">
                                        <div class="col-lg-4">
                                            <a href="">
                                                <div class="img-wrapper">
                                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="">
                                                <div class="img-wrapper">
                                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="">
                                                <div class="img-wrapper">
                                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="card profile-card">
                        <div class="card-body">
                            
       
                        <ul class="side-menu">
         
            <li>
                <button type="button" data-bs-toggle="modal" data-bs-target="#add-event">
                    <img src="assets/img/svg/add-event.svg" alt="">
                    Add Event
                </button>
            </li>
            
        </ul>
   
                            <h3 class="card-title">About</h3>
                            <ul class="list-icons-s1">
                                <li class="list-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>{{$businessDetail->city}}, {{$businessDetail->country}}</p>
                                </li>
                                <li class="list-item">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <i class="far fa-clock"></i>
                                                <div class="d-flex justify-content-between w-100">
                                                    <p>Monday open 24 hours</p>
                                                    <p><span>view more</span></p>

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @if(!empty($workingHours))
                                                @foreach($workingHours as $hour)
                                                <div class="d-flex justify-content-between my-1">
                                                    <p>{{$hour->day}}</p>
                                                    <p>Open: {{$hour->openTime}} </p>
                                                    <p> Close :{{$hour->closeTime}}</p>

                                                </div>
                                                @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <p>{{$businessDetail->businessContact}}</p>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-list-ul"></i>
                                    <p>{{$businessDetail->businessType}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
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