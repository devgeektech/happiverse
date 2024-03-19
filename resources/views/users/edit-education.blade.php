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
                                <div class="editing-info">
                                    <h5 class="f-title"><i class="ti-info-alt"></i> Edit Education Information</h5>
                                    @include('auth.partials.messages')
                                    <form method="post" action="{{ route('education-information.update') }}">
                                        @csrf
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked="checked" value="1" name="currently_studying"><i class="check-box"></i>Currently Working
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="userId" value="{{$user->getUserDetail->userId}}">
                                            <input type="text" id="input" name="title" value="{{$user->getUserDetail->education[0]->title ?? ''}}" />
                                            <label class="control-label" for="input">Study at</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="Date" name="startDate" value="{{$user->getUserDetail->education[0]->startDate ?? ''}}" />
                                            <label class="control-label" for="input">From</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="Date" name="endDate" value="{{$user->getUserDetail->education[0]->endDate ?? ''}}" />
                                            <label class="control-label" for="input">To</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="location" value="{{$user->getUserDetail->education[0]->location ?? ''}}" />
                                            <label class="control-label" for="input">Location</label><i class="mtrl-select"></i>
                                        </div>

                                        <div class="form-group">
                                            <select name="level">{{$user->getUserDetail->occupation[0]->level ?? ''}}
                                                <option value="School">School</option>
                                                <option value="Collage">Collage</option>
                                                <option value="University">University</option>
                                            </select>

                                            <label class="control-label" for="textarea">Level</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="submit-btns">
                                            <a href="{{route('dashboard')}}" class="mtr-btn"><span>Cancel</span></a>
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