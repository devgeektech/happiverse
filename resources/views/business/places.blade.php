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
                    <div class="card business-single-card">
                        <div class="card-body">
                            <input type="hidden" id="latitude">
                            <input type="hidden" id="longitude">
                            <div class="d-flex align-items-center gap-3 mb-3">
                            <button class="btn btn-primary btn-small  getHospitals" style="width: fit-content;" type="button" onclick="initMap()"><i class="fas fa-hospital me-2"></i>Hospitals</button>
                            <button class="btn btn-primary btn-small getResturants" style="width: fit-content;" type="button" onclick="initMap2()"><i class="fas fa-hospital me-2"></i>Resturants</button>
                            <button class="btn btn-primary btn-small" style="width: fit-content;" type="button" onclick="getLocation()"><i class="fas fa-hospital me-2"></i>Get Loc</button>
                            <button type="button" class="btn btn-primary btn-small" data-bs-toggle="modal" data-bs-target="#mapFilters">Map Filter</button>
                            </div>
                            <div id="map"></div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn--OTVX-wI6fOLCSw9HN54Bwua6z8ByI&libraries=places&callback=initMap" async defer></script>

<script type="text/javascript">
$(document).ready(function(){
   getLocation();
   $('.clearAll').click(function(){
        window.location.href="http://127.0.0.1:8000/hapiverse/public/places";   
   });
});
var map;

function initMap() {
    lat_=$('#latitude').val();
    long_=$('#longitude').val();
    var pyrmont = {
        lat: parseFloat(lat_),
        lng: parseFloat(long_)
    };
    // console.log(pyrmont);
    if (navigator.geolocation) {
        try {
            navigator.geolocation.getCurrentPosition(function(showPosition) {
                // console.log(showPosition.coords.latitude);
                // console.log(showPosition.coords.longitude);
                pyrmont = {
                    lat: showPosition.coords.latitude,
                    lng: showPosition.coords.longitude
                };
            });
        } catch (err) {

        }
    }
    
    // console.log(pyrmont);
    map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 9,
        draggable: true,
    });

    
    var service = new google.maps.places.PlacesService(map);
    var radius=4000;
    @if(session()->has('distance'))
        radius='{{@Session::get("distance")}}';
    @endif
    console.log(radius);
    service.nearbySearch({
            location: pyrmont,
            radius: radius,
            type: ['hospital']
        },
        function(results, status, pagination) {
            if (status !== 'OK') return;
            $('.getHospitals').click(function(){
                createMarkers(results);
                getNextPage = pagination.hasNextPage && function() {
                    pagination.nextPage();
                };    
            });
        });
}
function initMap2() {
    lat_=$('#latitude').val();
    long_=$('#longitude').val();
    var pyrmont = {
        lat: parseFloat(lat_),
        lng: parseFloat(long_)
    };
    if (navigator.geolocation) {
        try {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pyrmont = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
            });
        } catch (err) {

        }
    }
    map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 17
    });

    
    var service = new google.maps.places.PlacesService(map);
    
    service.nearbySearch({
            location: pyrmont,
            radius: 4000,
            type: ['restaurant']
        },
        function(results, status, pagination) {
            if (status !== 'OK') return;
            $('.getResturants').click(function(){
                createMarkers(results);
                getNextPage = pagination.hasNextPage && function() {
                    pagination.nextPage();
                };    
            });
        });
}
function createMarkers(places) {
    var bounds = new google.maps.LatLngBounds();
    var latlng = new google.maps.LatLng(23.8701334, 90.2713944);
    for (var i = 0, place; place = places[i]; i++) {
        var image = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
        };
        // var locations = [[new google.maps.LatLng(0, 0), places[i].name, 'Infowindow content for Marker 1']];
        var marker = new google.maps.Marker({
            map: map,
            title: place.name,
            position: place.geometry.location,
            draggable: true,
        });
        // console.log(place.geometry);
        var sunCircle = {
            strokeColor: "hwb(242deg 52% 23%)",
            strokeOpacity: 0.2,
            strokeWeight: 1,
            fillColor: "hwb(242deg 52% 23%)",
            fillOpacity: 0.15,
            map: map,
            center: latlng,
            radius: 4000 // in meters
        };
        cityCircle = new google.maps.Circle(sunCircle);
        cityCircle.bindTo('center', marker, 'position');
        var infoWindow = new google.maps.InfoWindow();
        bounds.extend(place.geometry.location);
        google.maps.event.addListener(marker, "click", function (e) {
            var location = e.latLng;
            infoWindow.setContent("<div style ='width:200px;min-height:40px'> Latitude:" + location.lat() + "<br/> Longitude:" + location.lng() + "</div>");
            infoWindow.open(map, marker);
        });
    }
    map.fitBounds(bounds);
}
function getLocation(){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else{
    
    }
}
function showPosition(position){
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('map')
  mapholder.style.height='250px';
  mapholder.style.width='100%';
  $('#latitude').val(lat);
  $('#longitude').val(lon);
  var myOptions={
  center:latlon,zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("map"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!",draggable: true});
}
</script>
<style>
#map {
  height: 350px !important;
  margin: 10px auto;
  width: 800px;
}
</style>
<div class="modal fade" id="mapFilters" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="card shadow-none">
                    <form action="{{url('/placesStore')}}" method="POST">
                        @csrf
                        <div class="input-wrapper">
                            <input type="text" class="form-control" placeholder="Where are you going?">
                        </div>
                        <h3 class="card-title">Sort by</h3>
                        <div class="input-wrapper custom-btn-group mb-3">
                            <button type="button" class="btn btn-primary">Rating</button>
                            <button type="button" class="btn btn-primary">Distance</button>
                            <button type="button" class="btn btn-primary">Risk</button>
                        </div>
                        <h3 class="card-title">Rating</h3>
                        <div class="input-wrapper custom-btn-group mb-3">
                            <button type="button" class="btn btn-primary">3.0</button>
                            <button type="button" class="btn btn-primary">3.5</button>
                            <button type="button" class="btn btn-primary">4.0</button>
                            <button type="button" class="btn btn-primary">4.5</button>
                            <button type="button" class="btn btn-primary">5.0</button>
                        </div>
                        <h3 class="card-title">Distance in km</h3>
                        <div class="input-wrapper mb-3">
                            <div class="slider-box">
                                <input class="form-control" type="text" id="priceRange" name="distance" value="{{@Session::get('distance')}}">
                                <div id="price-range" class="slider"></div>
                            </div>
                        </div>
                        <h3 class="card-title">Covid Risk Score</h3>
                        <div class="input-wrapper mb-3">
                            <div class="slider-box">
                                <input class="form-control" type="text" id="covidRisk" >
                                <div id="covid-risk" class="slider"></div>
                            </div>
                        </div>
                        <div class="custom-btn-group">
                            <button class="btn btn-light w-100 clearAll" type="button">Clear all</button>
                            <button class="btn btn-primary w-100" type="submit" name="results" >View results</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>