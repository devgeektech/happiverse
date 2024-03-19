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
                    <h3 class="card-title">Videos</h3>
                    @foreach($photos as $photo)
                    @foreach($photo->postImage as $video)
                    
                    @php
                    $extention=pathinfo($video->postFileUrl, PATHINFO_EXTENSION);
                    @endphp
                    @if($extention=="MOV" || $extention=="mp4" )
                        <a href="#" >
                            <div class="card video-list-card">
                                <div class="row g-0">
                                    <div class="card-body p-0">
                                        <div class="card-video-wrapper">
                                            <button class="btn btn-primary"><i class="fas fa-play"></i></button>
                                            <video height="350" style="width: 100%; object-fit: contain; background-color: #000;" controls src="{{'http://127.0.0.1:8000/'.$video->postFileUrl}}" class="card-video" muted></video>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-8">-->
                                    <!--    <div class="card-body">-->
                                    <!--        <h3 class="card-title">Blog Number 1</h3>-->
                                    <!--        <p class="card-text"></p>-->
                                    <!--        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio iusto pariatur magni hic quam voluptatum tenetur.</p>-->
                                    <!--        <p class="card-text">Ameer Hamza <img class="verified-icon" src="assets/img/png/verified.png" alt=""></p>-->
                                    <!--        <p class="card-text">24 Jan, 5.8M views</p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </a>
                    @endif
                    @endforeach
                    @endforeach
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