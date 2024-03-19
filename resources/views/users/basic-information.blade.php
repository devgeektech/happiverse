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
                                    <h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>
                                    @include('auth.partials.messages')
                                    <form method="post" action="{{ route('basic-information') }}">
                                        @csrf
                                        <input type="hidden" name="userId" value="{{$user->getUserDetail->userId}}">
                                        <div class="form-group half">
                                            <input type="text" id="input" value="{{$user->getUserDetail->userName}}" name="userName" />
                                            <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <select name="martialStatus">
                                                <option value="Married">Married</option>
                                                <option value="Un-married">Un-married</option>
                                                <option value="Single">Single</option>
                                                <option value="In-relationship">In-relationship</option>
                                            </select>
                                            <label class="control-label" for="input">Marital Status</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" disabled />
                                            <label class="control-label">{{$user->getUserDetail->email}}</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="phoneNo" value="{{$user->getUserDetail->phoneNo}}" />
                                            <label class="control-label" for="input">Mobile No</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="date" name="dob" value="{{$user->getUserDetail->DOB}}" />
                                            <label class="control-label" for="input">Date of birth</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <select name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>

                                            </select>
                                            <label class="control-label" for="input">Gender</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="religion" value="{{$user->getUserDetail->religion}}" />
                                            <label class="control-label" for="input">Religion</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="height" value="{{$user->getUserDetail->height}}" />
                                            <label class="control-label" for="input">Height</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="hairColor" value="{{$user->getUserDetail->hairColor}}" />
                                            <label class="control-label" for="input">Hair Color</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="postCode" value="{{$user->getUserDetail->postCode}}" />
                                            <label class="control-label" for="input">Postal Code</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="address" value="{{$user->getUserDetail->address}}" />
                                            <label class="control-label" for="input">Address</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="lat" value="{{$user->getUserDetail->lat}}" />
                                            <label class="control-label" for="input">Lat</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="long" value="{{$user->getUserDetail->long}}" />

                                            <label class="control-label" for="input">Long</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="city" value="{{$user->getUserDetail->city}}" />
                                            <label class="control-label" for="input">City</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="text" name="country" value="{{$user->getUserDetail->country}}" />
                                            <label class="control-label" for="input">Country</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="4" id="textarea" name="bio" value="{{$user->getUserDetail->bio}}">{{$user->getUserDetail->bio ?? 'Bio'}}</textarea>
                                            <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="submit-btns">
                                            <button type="button" class="mtr-btn"><span>Cancel</span></button>
                                            <button type="submit" class="mtr-btn"><span>Update</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- centerl meta -->
                        <div class="col-lg-3">
                            <aside class="sidebar static">
                                <div class="widget">
                                    <h4 class="widget-title">Your page</h4>
                                    <div class="your-page">
                                        <figure>
                                            <a title="" href="#"><img alt="" src="images/resources/friend-avatar9.jpg"></a>
                                        </figure>
                                        <div class="page-meta">
                                            <a class="underline" title="" href="#">My page</a>
                                            <span><i class="ti-comment"></i>Messages <em>9</em></span>
                                            <span><i class="ti-bell"></i>Notifications <em>2</em></span>
                                        </div>
                                        <div class="page-likes">
                                            <ul class="nav nav-tabs likes-btn">
                                                <li class="nav-item"><a data-toggle="tab" href="#link1" class="active">likes</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#link2" class="">views</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div id="link1" class="tab-pane active fade show">
                                                    <span><i class="ti-heart"></i>884</span>
                                                    <a title="weekly-likes" href="#">35 new likes this week</a>
                                                    <div class="users-thumb-list">
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Anderw">
                                                            <img alt="" src="images/resources/userlist-1.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="frank">
                                                            <img alt="" src="images/resources/userlist-2.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Sara">
                                                            <img alt="" src="images/resources/userlist-3.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Amy">
                                                            <img alt="" src="images/resources/userlist-4.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Ema">
                                                            <img alt="" src="images/resources/userlist-5.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Sophie">
                                                            <img alt="" src="images/resources/userlist-6.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Maria">
                                                            <img alt="" src="images/resources/userlist-7.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="link2" class="tab-pane fade">
                                                    <span><i class="ti-eye"></i>445</span>
                                                    <a title="weekly-likes" href="#">440 new views this week</a>
                                                    <div class="users-thumb-list">
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Anderw">
                                                            <img alt="" src="images/resources/userlist-1.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="frank">
                                                            <img alt="" src="images/resources/userlist-2.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Sara">
                                                            <img alt="" src="images/resources/userlist-3.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Amy">
                                                            <img alt="" src="images/resources/userlist-4.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Ema">
                                                            <img alt="" src="images/resources/userlist-5.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Sophie">
                                                            <img alt="" src="images/resources/userlist-6.jpg">
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="#" data-original-title="Maria">
                                                            <img alt="" src="images/resources/userlist-7.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget stick-widget">
                                    <h4 class="widget-title">Who's follownig</h4>
                                    <ul class="followers">
                                        <li>
                                            <figure><img src="images/resources/friend-avatar2.jpg" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="images/resources/friend-avatar4.jpg" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Issabel</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="images/resources/friend-avatar6.jpg" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Andrew</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="images/resources/friend-avatar8.jpg" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Sophia</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="images/resources/friend-avatar3.jpg" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Allen</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- who's following -->
                            </aside>
                        </div><!-- sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@include('web.layouts.footer')