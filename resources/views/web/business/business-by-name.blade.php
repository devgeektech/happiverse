@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')


<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        @include('web.search.search-card')
                        <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="groups">
                                    <span><i class="fa fa-users"></i> Peoples</span>
                                </div>
                                <ul class="nearby-contct">
                                    @foreach($data as $data)
                                    <li>
                                        <div class="nearly-pepls">
                                            <figure>
                                                <a href="time-line.html" title=""><img src="{{asset('userdoc/'.$data->profileImageUrl)}}" alt=""></a>
                                            </figure>
                                            <div class="pepl-info">
                                                <h4><a href="time-line.html" title="">{{$data->businessName}}</a></h4>
                                                <span>{{$data->country}}</span>


                                                <a href="{{url('people-profile/'.$data->userId)}}" title="" class="add-butn" data-ripple="">Show</a>
                                            </div>
                                        </div>
                                    </li>
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



</div>

@include('web.layouts.footer')