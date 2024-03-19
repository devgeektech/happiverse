@php
$user=Auth::user() ?? "";
$businessDetail=$user->getBusinessDetail;

@endphp
<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{__('msg.events')}}</h3>
        @foreach($events as $event)
        
            <div class="card event-card">
                <div class="row">
                    <div class="col-lg-5">
                        <a href="{{url('event-details/'.$event->eventId)}}">
                            <img src="{{ $event->businessEImages!=NULL ? 'http://127.0.0.1:8000/'.$event->businessEImages[0] : '' }}" alt="" class="card-img">
                        </a>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body">
                            <div class="card-title">{{$event->eventDate}} at {{$event->eventTime}}</div>
                            <p class="title">{{$event->eventName}}</p>
                            <p class="lead mb-3">{{$event->eventDescription}}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        @endforeach
    </div>
</div>

<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>