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
                          

                            <div id="people-posts">
                                <!-- Results -->
                            </div>
                            <div class="loadMore">

                            </div>

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