@extends('layouts.auth-master')
@section('content')
@include('layouts.partials.messages')

<form class="auth-login-form mt-2" method="POST" action="{{ route('login.perform') }}">
    @csrf
    <div class="form-group">
        <label class="form-label" for="login-email">Email</label>
        <input class="form-control" type="text" name="username" value="{{ old('username') }}" placeholder="Email Address" aria-describedby="login-email" autofocus="" tabindex="1" required="required" />
        @if ($errors->has('username'))
        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
        @endif
    </div>
    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="login-password">Password</label><a href="{{route('forget.password.get')}}"><small>Forgot Password?</small></a>
        </div>
        <div class="input-group input-group-merge form-password-toggle">
            <input class="form-control form-control-merge" type="password" name="password" value="{{ old('password') }}" required="required" placeholder="Password" aria-describedby="login-password" tabindex="2" />
            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
            @if ($errors->has('password'))
            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
            <label class="custom-control-label" for="remember-me"> Remember Me</label>
        </div>
    </div>
    <button class="btn btn-primary btn-block" tabindex="4" type="submit">Sign in</button>
</form>

<footer>
    “Welcome to the Outernet, where your data geo-connects you to create your Hapiverse.”
</footer>
@endsection
