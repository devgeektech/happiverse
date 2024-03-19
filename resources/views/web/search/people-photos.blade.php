@php
$user=Auth::user();
$userIntrest=$user->getUserDetail->userIntrests ?? '';

@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')
@include('web.search.timeline-header')
<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">

                        @include('web.search.people-intro-card');
                        <div class="col-lg-6">


                            <div class="central-meta">

                                <ul class="photos">
                                    @foreach($postWithImages as $img)
                                    @foreach($img->postImage as $pImg)
                                    @php

                                    $extention=pathinfo($pImg->postFileUrl, PATHINFO_EXTENSION);
                                    @endphp
                                    @if($extention=="jpg" || $extention=="png")
                                    <li>
                                        <a class="strip" href="{{asset($pImg->postFileUrl)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                            <img src="{{asset($pImg->postFileUrl)}}" alt=""></a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </ul>

                                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                            </div><!-- photos -->
                        </div><!-- centerl meta -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
</div>
</div>
@include('web.layouts.footer')