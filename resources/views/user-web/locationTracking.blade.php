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
                        <div class="card-body">
                            <div class="card shadow-none">
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tracking-tab" data-bs-toggle="tab" data-bs-target="#tracking-tab-pane" type="button" role="tab" aria-controls="slocation-tab-pane" aria-selected="true">Location Tracking</button>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="tracking-tab-pane" role="tabpanel" aria-labelledby="slocation-tab" tabindex="0">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">LocationTracking</div>
                                              
<ul class="friends-list mb-3">
                                    @foreach($locations as $location)
                                 
                                    @php
                                    $profile_image_url = $location->getUserDetail->profileImageUrl??"";
                                    @endphp
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="{{'http://127.0.0.1:8000/'.$profile_image_url??""}}" style = "margin-top:10px">
                                                    <div>
                                                        <h3 class="title">{{$location->getUserDetail->userName??""}}</h3>
                                                        <p class="lead">currentlocation</p>
                                                    </div>
                                                </a>
                                                <a href="https://www.google.com/maps/place/{{$location->address}}">Tracking</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                 
                                        
                                         
                                               
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="slocation-tab-pane" role="tabpanel" aria-labelledby="slocation-tab" tabindex="0">
                                    <ul class="friends-list mb-3">
                                    @foreach($locations as $location)
                                    @php
                                    $profile_image_url = $location->getUserDetail->profileImageUrl??"";
                                    @endphp
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="{{'http://127.0.0.1:8000/'.$profile_image_url??""}}" style = "margin-top:10px">
                                                    <div>
                                                        <h3 class="title">{{$location->getUserDetail->userName??""}}</h3>
                                                        <p class="lead">currentlocation</p>
                                                    </div>
                                                </a>
                                                <a href="{{url('/removeLocation/'.$location->trackLocationId)}}" class="btn btn-primary btn-small">Remove</a>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                    <a href="#" class="btn btn-primary">Remove All</a>
                                </div>
                                <div class="tab-pane fade" id="lrequests-tab-pane" role="tabpanel" aria-labelledby="lrequests-tab" tabindex="0">
                                    <ul class="friends-list">
                                        @foreach($requests as $request)
                                        @php
                                        $profileImageUrl = "";
                                        $requestDetails =  MstUser::where("userId",$request->requesterId)->get();
                                        foreach($requestDetails as $requestDetail){
                                        $requestName = $requestDetail->userName;
                                        $profileImageUrl = $requestDetail->profileImageUrl??"";
                                        }
                                        @endphp
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="{{'http://127.0.0.1:8000/'.$profileImageUrl??""}}" style = "margin-top:10px">
                                                    <div>
                                                        <h3 class="title">{{$requestName??""}}</h3>
                                                        <p class="lead">currentlocation</p>
                                                    </div>
                                                </a>
                                                <a href="" class="btn btn-primary btn-small">{{$request->status}}</a>
                                            </div>
                                        </li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                            </div>
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
<script>
       //var latglong = new google.maps.LatLng(37.4419, -122.1419);
        var latglong = new google.maps.LatLng(24.840532050240473, 67.0518992229778);
var zoom = 13;

function initialize() {
  var mapOptions = {
    zoom: zoom,
    center: latglong,
    scrollwheel: false,
    streetViewControl: false,
    mapTypeControl: false
  };


  map = new google.maps.Map(document.getElementById('oh-event-map-canvas'), mapOptions);
  google.maps.event.addListener(map, 'click', function(evt) {
    console.log(evt);
  })

  var infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);

  service.getDetails({
    placeId: 'ChIJw5sBQ6o9sz4RaRFTEAoY3-g'
    
//   place.name: "Mariana Tech"
   
  }, function(place, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
      fillInAddress(place);
      var marker = new google.maps.Marker({
        map: map,
        //position: place.geometry.location
     
      });
      // display window on the Map
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent('<div><b>' + place.name + '</b><br>' +
          document.getElementById('street_number').value + ' ' + document.getElementById('route').value + '<br>' + document.getElementById('locality').value + ' ' + document.getElementById('postal_code').value + ' ' + document.getElementById('administrative_area_level_1').value + '<br>' +
          document.getElementById('country').value + '<br><div class="view-link"> <a target="_blank" href="https://www.google.de//maps/place/adsfasdfadsfadf"> <span>In Google Maps ansehen</span> </a> </div>')
        infowindow.open(map, this);
      });
    }
  });
}
google.maps.event.addDomListener(window, "load", initialize);
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function fillInAddress(place) {
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }
  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
</script>
