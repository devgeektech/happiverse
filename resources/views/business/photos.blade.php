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

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Photos</h3>
                            <div class="row photos-gallery">
                                @foreach($photos as $photo)
                                @foreach($photo->postImage as $img)
                                <div class="col-lg-4">
                                    <a href="{{'http://127.0.0.1:8000/'.$img->postFileUrl}}" target="_blank">
                                        <div class="img-wrapper">
                                            <img src="{{'http://127.0.0.1:8000/'.$img->postFileUrl}}" alt="">
                                        </div>
                                    </a>
                                </div>
                                @endforeach

                                @endforeach

                            </div>
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