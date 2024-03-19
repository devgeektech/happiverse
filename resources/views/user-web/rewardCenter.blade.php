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
                        <div class= "card-header">Reward Center</div>
                        @php
                        $total_coins = 0;
                      foreach($coins as $coin){
                     
                      $total_coins = $total_coins + $coin->coin;
                     
                      }
                      @endphp
                        
                        <div class="card shadow-none">
                            <img src="{{asset('assets/img/svg/coins.svg')}}" class="mx-auto w-25 my-3" alt="">
                            
                            <h3 class="card-title text-center mb-4 fs-1">{{$total_coins}}</h3>
                            
                            {{--<div class="btn btn-primary w-100">Claim all</div>--}}
                        </div>
                    
                        
                        <ul class="friends-list">

                                @foreach($coins as $coin)                
                                <li class="list-item">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <a class="d-flex align-items-center gap-2" >
                                                                                                                                    <img class="user-img" src="{{url('http://127.0.0.1:8000/'.$coin->getBusinessDetail->logoImageUrl)}}">
                                            <div>
                                                <h3 class="title">{{$coin->getBusinessDetail->businessName}}</h3>
                                            </div>
                                                                                    </a>
                                                                                
                                      
                                                                                
                                        <a class="btn btn-primary btn-small">{{$coin->coin}}  Points</a>
                                    </div>
                                </li>
                                 @endforeach                                                                                   
                            
                                                                
                            </ul>
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

