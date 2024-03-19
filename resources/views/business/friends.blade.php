@php
$user=Auth::user() ?? "";
$businessDetail=$user->getBusinessDetail??"";
$workingHours=$businessDetail->workingHours ??"";
$products=$businessDetail->businessProduct ??"";
@endphp
@include('business.layouts.head')
@include('business.layouts.header')

<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row">
                @include('business.layouts.sidebar')
                <div class="col-lg-6">
                    <div class="card friends-card">
                        <div class="card-body">
                            <h3 class="card-title">Friends</h3>
                            <ul class="friends-list">
                                @foreach($getFriendsList as $friend)

                                <li class="list-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="d-flex align-items-center gap-2" href="">
                                            <img class="user-img" src="{{'http://127.0.0.1:8000/'.$friend->friend->profileImageUrl}}">
                                            <div>
                                                <h3 class="title">{{$friend->friend->userName}}</h3>

                                            </div>
                                        </a>
                                        <a href="{{url('unfriend/'.$friend->friend->userId ?? '')}}" class="btn btn-primary btn-small">Unfriend</a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>



                </div>
                <div class="col-lg-3">
                    <div class="card profile-card">
                        <div class="card-body">
                            <h3 class="card-title">About</h3>
                            <ul class="list-icons-s1">
                                <li class="list-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>{{$businessDetail->city}}, {{$businessDetail->country}}</p>
                                </li>
                                <li class="list-item">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <i class="far fa-clock"></i>
                                                <div class="d-flex justify-content-between w-100">
                                                    <p>Monday open 24 hours</p>
                                                    <p><span>view more</span></p>

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @foreach($workingHours as $hour)
                                                <div class="d-flex justify-content-between my-1">
                                                    <p>{{$hour->day}}</p>
                                                    <p>Open: {{$hour->openTime}} </p>
                                                    <p> Close :{{$hour->closeTime}}</p>

                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <p>{{$businessDetail->businessContact}}</p>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-list-ul"></i>
                                    <p>{{$businessDetail->businessType}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('business.layouts.footer')