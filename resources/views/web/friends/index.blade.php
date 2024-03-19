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
                                <div class="frnds">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a> <span>{{$getFriendsList->count()}}</span></li>
                                        <!-- <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a><span>60</span></li> -->
                                    </ul>
                                    @include('auth.partials.messages')
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active fade show " id="frends">
                                            <ul class="nearby-contct">
                                                @foreach($getFriendsList as $list)

                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="{{asset('userdoc/'.$list->friend()->first()->profileImageUrl)}}" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">{{$list->friend()->first()->userName ?? ""}}</a></h4>
                                                            <span>{{$list->occupation->first()->description ?? ""}}</span>
                                                            <a href="{{url('unfriend/'.$list->friend()->first()->userId ?? '')}}" title="" class="add-butn more-action" data-ripple="">unfriend</a>
                                                            <!-- <a href="#" title="" class="add-butn" data-ripple="">add friend</a> -->
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                        </div>
                                        <!-- <div class="tab-pane fade" id="frends-req">
                                            <ul class="nearby-contct">
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/nearly5.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">Amy watson</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/nearly1.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">sophia Gate</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/nearly6.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">caty lasbo</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">jhon kates</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/nearly2.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">sara grey</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/nearly4.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">Sara grey</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/nearly3.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">Sexy cat</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                            <a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title="">jhon kates</a></h4>
                                                            <span>ftv model</span>
                                                            <a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button class="btn-view btn-load-more"></button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- centerl meta -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('web.layouts.footer')