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
                                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Create</a>
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
            @include('layouts.partials.messages')



            <!-- Tooltip validations start -->
            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add User</h4>
                            </div>
                            <div class="card-body">
                                <p>

                                </p>
                                <form class="needs-validation" method="POST" action="{{route('users.create')}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip01">Name</label>
                                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Name" required />
                                            @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Username</label>
                                            <input type="text" class="form-control" id="validationTooltip02" placeholder="Username" value="{{ old('username') }}" name="username" required />
                                            @if ($errors->has('username'))
                                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip03">Email</label>
                                            <input type="text" class="form-control" id="validationTooltip03" placeholder="Email" value="{{ old('email') }}" name="email" required />

                                            @if ($errors->has('email'))
                                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip03">Role</label>
                                            <select name="role" class="form-control">
                                                <option disabled selected>---Please Select Role---</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>

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