@php
$userDetail=\Auth::user() ?? "";
@endphp
<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row" id="page-contents">
                <div class="col-lg-3">
                    <div class="card d-none d-lg-block">
                        <div class="card-body">
                            <div class="d-flex align-items-center admin-profile">
                                <h4 class="card-title">
                                </h4>
                            </div>
                        </div>
                        <ul class=" side-menu">
                            <li>
                                <a class="active" href="{{route('dashboard')}}" title="Post">
                                    <img src="assets/img/svg/home-ico.svg" alt="">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{route('about')}}" title="My Profile">
                                    <img src="assets/img/svg/profile-ico.svg" alt="">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{route('friends')}}" title="Friends">
                                    <img src="assets/img/svg/friends-ico.svg" alt="">
                                    Friends
                                </a>
                            </li>
                            <li>
                                <a href="{{route('photos')}}" title="Photos">
                                    <img src="assets/img/svg/gallery-ico.svg" alt="">
                                    Photos
                                </a>
                            </li>
                            <li>
                                <a href="{{route('videos')}}" title="Videos">
                                    <img src="assets/img/svg/video-ico.svg" alt="">
                                    Videos
                                </a>
                            </li>
                            <li>
                                <a href="{{route('musics')}}" title="Music">
                                    <img src="assets/img/svg/music-ico.svg" alt="">
                                    Music
                                </a>
                            </li>
                            <li>
                                <a href="{{route('groups')}}" title="">
                                    <img src="assets/img/svg/group-ico.svg" alt="">
                                    Groups
                                </a>
                            </li>
                            <li>
                                <a href="{{route('orders')}}" title="">
                                    <img src="assets/img/svg/order-ico.svg" alt="">
                                    Order
                                </a>
                            </li>
                            <li>
                                <a href="#" title="">
                                    <img src="assets/img/svg/stealth-ico.svg" alt="">
                                    Stealth
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout.perform')}}" title="">
                                    <img src="assets/img/svg/logout-ico.svg" alt="">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>