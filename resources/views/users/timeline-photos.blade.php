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

                            <div class="central-meta">

                                <ul class="photos">
                                    @foreach($images as $img)
                                    @php
                                    $extention=pathinfo($img->postFileUrl, PATHINFO_EXTENSION);
                                    @endphp
                                    @if($extention=="jpg" || $extention=="png")
                                    <li>
                                        <a class="strip" href="{{asset($img->postFileUrl)}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                            <img src="{{asset($img->postFileUrl)}}" alt=""></a>
                                    </li>
                                    @endif
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
</section>


@include('web.layouts.footer')