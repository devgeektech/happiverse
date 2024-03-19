@php
$user=Auth::user();
@endphp
<div class="card sticky-card custom-side-menu">
    <div class="card-body p-0">
        <div class="d-flex align-items-center admin-profile">
            <img class="user-img" src="{{asset('libraries/latest-assets/images/resources/admin.jpg')}}" alt="">
            <h4 class="card-title">{{$user->getUserDetail->userName}}</h4>
            <h4 class="card-title">Business Account</h4>
        </div>
        <ul class="side-menu">
            <li>
                <a class="active" href="{{route('dashboard')}}" title="Post">
                    <i class="ti-dashboard"></i>
                    Home
                </a>
            </li>


            <li>
                <a href="{{route('photos')}}" title="Photos">
                    <i class="ti-image"></i>
                    Orders
                </a>
            </li>
            <li>
                <a href="{{route('videos')}}" title="Videos">
                    <i class="ti-video-camera"></i>
                    Events
                </a>
            </li>
            <li>
                <a href="{{route('musics')}}" title="Music">
                    <i class="ti-video-camera"></i>
                    Ads
                </a>
            </li>
        </ul><!-- Shortcuts -->
    </div>
</div>