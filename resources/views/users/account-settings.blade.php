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
                                    <h5 class="f-title"><i class="ti-settings"></i>account setting</h5>
                                    <form method="post" action="{{route('account-settings.update')}}">
                                        @csrf
                                        <div class="setting-row">
                                            <span>Privacy (Public/Private)</span>
                                            <p>Enable this if you public see your profile</p>
                                            <input type="checkbox" id="switch00" name="privacy" value="Yes" <?php echo $isPrivate == 1 ? ' checked' : ''; ?> />
                                            <label for="switch00" data-off-label="OFF" data-on-label="ON"></label>

                                        </div>
                                        <div class="submit-btns">
                                            <button type="button" class="mtr-btn"><span>Cancel</span></button>
                                            <button type="submit" class="mtr-btn"><span>Update</span></button>
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