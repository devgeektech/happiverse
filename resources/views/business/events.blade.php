@php
$user=Auth::user() ?? "";
$businessDetail=$user->getBusinessDetail;

@endphp
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Events</h3>
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
                            <div class="custom-btn-group flex-column">
                                <a class="btn btn-light btn-small w-100 edit-events-data" data-id="{{$event->eventId}}" data-bs-toggle="modal" data-bs-target="#edit-event"><i class="far fa-edit me-1"></i>Edit Event</a>
                                <a href="{{url('delete-event/'.$event->eventId)}}" class="btn btn-light btn-small w-100" onclick="return myFunction();"><i class="fas fa-trash-alt me-1"></i>Delete Event</a>
                            </div>
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