@php
$user=Auth::user();
$userDetail=$user->getUserDetail ?? '';
$images=$userDetail->postImages;
@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')

<section>

    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        @include('home.short-cuts')
                        <div class="col-lg-6">
                            <div class="card">
                                @foreach($videos as $video)
                                @php
                                $extention=pathinfo($video->postFileUrl, PATHINFO_EXTENSION);
                                @endphp
                                @if($extention=="MOV" || $extention=="mp4" )
                                <div class="video-wrapper mb-3">
                                    <video width="100%" height="450" controls autoplay muted src="{{asset($video->postFileUrl)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></video>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div><!-- centerl meta -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('web.layouts.footer')