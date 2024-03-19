@php
$image='';
@endphp
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
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="user-img online">
                                    <img src="{{'http://127.0.0.1:8000/'.$image}}" alt="" class="user-img">
                                </div>
                            </div>
                            <h2>HAPIVERSE ABOUT</h2>
        <p>hapiverse is a new experience, wherein users and businesses use their mobile devices and geo-location technology to connect in real time based on their interests and preferences. </p>
        <p>We use machine learning artificial intelligence to create behavioral models that generate recommendations, based on identified interests and actions. </p>
        <p>We call this environment the outernet, because we allow users and businesses to meet and connect outside of the net based on data driven information obtained on the net.</p>
        <p>Imagine being able to go to any city and fill at home, because you ae connected to businesses and users that that into your interest category. </p>
        <p>You also have the ultimate power to reject any users or businesses and not allow them to connect with you, at any time.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.footer')
@else
    @include('business.layouts.footer')
@endif