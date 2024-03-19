@extends('home')
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Create</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('business.index')}}">Create</a>
                                </li>
                                <li class="breadcrumb-item active">Form
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Tooltip validations start -->
            @include('layouts.partials.messages')

            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Business</h4>
                            </div>
                            <div class="card-body">
                                <p>

                                </p>
                                <form method="POST" action="{{route('business.store')}}" enctype="multipart/form-data" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">

                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip01">Business Name</label>
                                            <input type="text" class="form-control" value="{{ old('businessName') }}" name="businessName" placeholder="Business Name" required />
                                            @if ($errors->has('businessName'))
                                            <span class="text-danger text-left">{{ $errors->first('businessName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Business Email</label>
                                            <input type="email" class="form-control" placeholder="Business Email" value="{{ old('email') }}" name="email" required />
                                            @if ($errors->has('email'))
                                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Owner Name</label>
                                            <input type="text" class="form-control" placeholder="Owner Name" value="{{ old('ownerName') }}" name="ownerName" required />
                                            @if ($errors->has('ownerName'))
                                            <span class="text-danger text-left">{{ $errors->first('ownerName') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Business Contact</label>
                                            <input type="number" class="form-control" placeholder="Business Contact" value="{{ old('businessContact') }}" name="businessContact" required />
                                            @if ($errors->has('businessContact'))
                                            <span class="text-danger text-left">{{ $errors->first('businessContact') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">VAT No.</label>
                                            <input type="number" class="form-control" placeholder="VAT no." value="{{ old('vatNumber') }}" name="vatNumber" required />
                                            @if ($errors->has('vatNumber'))
                                            <span class="text-danger text-left">{{ $errors->first('vatNumber') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" value="{{ old('address') }}" name="address" required />
                                            @if ($errors->has('address'))
                                            <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">City</label>
                                            <input type="text" class="form-control" placeholder="City" value="{{ old('city') }}" name="city" required />
                                            @if ($errors->has('city'))
                                            <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Country</label>
                                            <input type="text" class="form-control" placeholder="Country" value="{{ old('country') }}" name="country" required />
                                            @if ($errors->has('country'))
                                            <span class="text-danger text-left">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Latitude</label>
                                            <input type="number" class="form-control" placeholder="Latitude" value="{{ old('latitude') }}" name="latitude" required />
                                            @if ($errors->has('latitude'))
                                            <span class="text-danger text-left">{{ $errors->first('latitude') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Longitude</label>
                                            <input type="number" class="form-control" placeholder="longitude" value="{{ old('longitude') }}" name="longitude" required />
                                            @if ($errors->has('longitude'))
                                            <span class="text-danger text-left">{{ $errors->first('longitude') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">isAlwaysOpen</label>
                                            <select class="form-control" name="isAlwaysOpen">
                                                <option selected disabled>--SELECT OPTION--</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                            @if ($errors->has('isAlwaysOpen'))
                                            <span class="text-danger text-left">{{ $errors->first('isAlwaysOpen') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Business Type</label>
                                            <select class="form-control" name="businessType">
                                                <option selected disabled>--SELECT OPTION--</option>
                                                <option value="Entertainment">Entertainment</option>
                                                <option value="Restaurant">Restaurant</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Training Center">Training Center</option>
                                                <option value="Dance Club">Dance Club</option>
                                            </select>
                                            @if ($errors->has('isAlwaysOpen'))
                                            <span class="text-danger text-left">{{ $errors->first('isAlwaysOpen') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">isActive</label>
                                            <select class="form-control" name="isActive">
                                                <option selected disabled>--SELECT OPTION--</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                            @if ($errors->has('isAlwaysOpen'))
                                            <span class="text-danger text-left">{{ $errors->first('isAlwaysOpen') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Category</label>
                                            <select class="form-control" name="categoryId">
                                                <option selected disabled>--SELECT OPTION--</option>
                                                <option value="1">Film</option>
                                                <option value="2">Cinema</option>
                                                <option value="3">Webdevelopement</option>
                                                <option value="4">FrontEnd</option>
                                                <option value="5">It Training</option>
                                                <option value="6">Marraige</option>
                                            </select>
                                            @if ($errors->has('categoryId'))
                                            <span class="text-danger text-left">{{ $errors->first('categoryId') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip03">Logo</label>
                                            <input type="file" class="form-control" id="validationTooltip03" placeholder="Logo" value="{{ old('logoImageUrl') }}" name="logoImageUrl" required />

                                            @if ($errors->has('logoImageUrl'))
                                            <span class="text-danger text-left">{{ $errors->first('logoImageUrl') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip03">Feature Image</label>
                                            <input type="file" class="form-control" id="validationTooltip03" placeholder="featureImageUrl" value="{{ old('featureImageUrl') }}" name="featureImageUrl" required />

                                            @if ($errors->has('featureImageUrl'))
                                            <span class="text-danger text-left">{{ $errors->first('featureImageUrl') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Tooltip validations end -->

        </div>
    </div>
</div>
@stop