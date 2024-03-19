@php
$user=Auth::user();
if($user->userTypeId==2){
$users=$user->getBusinessDetail->businessName;
}else{
$users=$user->getUserDetail->userName;
}
@endphp
<div class="card sticky-card custom-side-menu">
    <div class="card-body p-0">
        <div class="d-flex align-items-center admin-profile">
            <img class="user-img" src="{{asset('libraries/latest-assets/images/resources/admin.jpg')}}" alt="">
            <h4 class="card-title">{{$users}}</h4>
        </div>
        <ul class="side-menu">
            <li>
                <a class="active" href="{{route('dashboard')}}" title="Post">
                    <i class="ti-dashboard"></i>
                    Home
                </a>
            </li>

            <li>
                <a href="{{route('about')}}" title="My Profile">
                    <i class="ti-user"></i>
                    My Profile
                </a>
            </li>
            <li>
                <a href="{{route('friends')}}" title="Friends">
                    <i class="ti-user"></i>
                    Friends
                </a>
            </li>
            <li>
                <a href="{{route('photos')}}" title="Photos">
                    <i class="ti-image"></i>
                    Photos
                </a>
            </li>
            <li>
                <a href="{{route('videos')}}" title="Videos">
                    <i class="ti-video-camera"></i>
                    Videos
                </a>
            </li>
            <li>
                <a href="{{route('musics')}}" title="Music">
                    <i class="ti-video-camera"></i>
                    Music
                </a>
            </li>
            <li>
                <a href="{{route('groups')}}" title="">
                    <i class="ti-video-camera"></i>
                    Groups
                </a>
            </li>
            <li>
                <a href="{{route('orders')}}" title="">
                    <i class="ti-video-camera"></i>
                    Order
                </a>
            </li>
            <li>
                <a href="#" title="">
                    <i class="ti-video-camera"></i>
                    Stealth
                </a>
            </li>
            <li>
                <a href="{{route('logout.perform')}}" title="">
                    <i class="ti-power-off"></i>
                    Logout
                </a>
            </li>
        </ul><!-- Shortcuts -->
    </div>
</div>