@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif
<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                             @foreach($jobs as $job)
                            <h3 class="card-title">
                                {{ $job-> companyName}}</h3>
                           
                            
                            <a href="">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">{{$job->jobTitle}} ({{$job->companyName}})</h3>
                                        <h3 class="title mb-2">{{ucfirst($job->workplaceType)}}-{{ucfirst($job->jobType)}}</h3>
                                        <p class="card-text fw-bold">{{$job->jobLocation}}</p>
                                        <p class="card-text">{{$job->jobDescription}}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@include('user-web.layouts.footer')