@php
$user=Auth::user();
@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')
@include('users.user-header')

<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                            @include('users.edit-info-card')
                        </div><!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="onoff-options">
                                    <h5 class="f-title"><i class="ti-lock"></i>change password</h5>
                                    @include('auth.partials.messages')
                                    <form method="post" action="{{route('change-password.update')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="password" required="required" name="current_password" />
                                            <label class="control-label" for="input">Current password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="input" required="required" name="new_password" />
                                            <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required="required" name="confirm_password" />
                                            <label class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
                                        </div>

                                        <!-- <a class="forgot-pwd underline" title="" href="#">Forgot Password?</a> -->
                                        <div class="submit-btns">
                                            <button type="button" class="mtr-btn"><span>Cancel</span></button>
                                            <button type="Submit" class="mtr-btn"><span>Update</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- centerl meta -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@include('web.layouts.footer')