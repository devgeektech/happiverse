@extends('home')
@section('content')
<!-- Start -->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-view">
                <!-- User Card & Plan Starts -->
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="card user-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                        <div class="user-avatar-section">
                                            <div class="d-flex justify-content-start">
                                                <img class="img-fluid rounded" src="{{asset('images/'.$business->logoImageUrl)}}" height="104" width="104" alt="User avatar" />
                                                <div class="d-flex flex-column ml-1">
                                                    <div class="user-info mb-1">
                                                        <h4 class="mb-0">{{ $business->businessName }}</h4>
                                                        <span class="card-text">{{ $business->email }}</span>
                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                        <a href="{{ route('business-ads.edit', $business->businessId) }}" class="btn btn-primary">Edit</a>

                                                        {!! Form::open(['method' => 'DELETE','route' => ['business.destroy', $business->businessId],'style'=>'display:inline']) !!}
                                                        {!! Form::button('Delete', ['type' => 'submit','class'=>'btn btn-outline-danger ml-1']) !!}
                                                        {!! Form::close() !!}
                                                        <!-- <button class="btn btn-outline-danger ml-1">Delete</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                        <div class="user-info-wrapper">
                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Business Name</span>
                                                </div>
                                                <p class="card-text mb-0"> {{ $business->businessName }}</p>
                                            </div>
                                            <div class="d-flex flex-wrap my-50">
                                                <div class="user-info-title">
                                                    <i data-feather="check" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Email:</span>
                                                </div>
                                                <p class="card-text mb-0">{{$business->email}}</p>
                                            </div>
                                            <div class="d-flex flex-wrap my-50">
                                                <div class="user-info-title">
                                                    <i data-feather="star" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Owner Name</span>
                                                </div>
                                                <p class="card-text mb-0">{{$business->ownerName}}</p>
                                            </div>
                                            <div class="d-flex flex-wrap my-50">
                                                <div class="user-info-title">
                                                    <i data-feather="flag" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">VAT Number</span>
                                                </div>
                                                <p class="card-text mb-0">{{$business->vatNumber}}</p>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Address</span>
                                                </div>
                                                <p class="card-text mb-0">{{$business->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <div class="row">


            </div>

        </div>
    </div>
</div>
@endsection