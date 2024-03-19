@php
use App\Models\MstUser;
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
            <div class="row" >
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif
        
        
                <div class="col-lg-9" >
                    <div class="card business-single-card">
                        <div class="card-header">Hapi AI answer</div>

                    <div class="card-body">
                        <p>{{ $response }}</p>
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

