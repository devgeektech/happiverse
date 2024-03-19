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
                    <div class="card order-card">
                                        <div class="product-img-slider">
                                            @forelse($eventImages as $eventImage)
                                            <div>
                                                <img src="{{ 'http://127.0.0.1:8000/'.$eventImage->imageUrl }}" alt="" class="card-img">
                                            </div>
                                            @empty
                                            
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=684&q=80" alt="" class="card-img">
                                            </div>
                                            @endforelse
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h3 class="card-title">{{$event->eventName}}</h3>
                                                    <p class="lead"><b class="me-2">Description</b>{{$event->eventDescription}}</p>
                                                </div>
                                                <h3 class="title-s2">{{date('d-M-Y',strtotime($event->eventDate)) }}{{' '.$event->eventTime}}</h3>
                                            </div>
                                            <p class="card-text">{{$event->address}}</p>
                        
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