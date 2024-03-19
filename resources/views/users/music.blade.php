@php
$user=Auth::user() ?? "";

$businessDetail=$user->getBusinessDetail??"";

$workingHours=$businessDetail->workingHours ??"";
$products=$businessDetail->businessProduct ??"";
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
                    <div class="card music-card">
                        <div class="position-relative">
                            <div class="music-banner">
                                <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                    alt="" class="card-img" id="additionImgCover">
                            </div>
                            <div class="music-controls-wrapper">
                                <div class="music-contol">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <button type="button" class="play-btn" id="playPause">
                                            <img class="play" id="playIcon" src="assets/img/svg/play.svg" alt="">
                                            <img class="pause" id="pauseIcon" src="assets/img/svg/pause.svg" alt="">
                                        </button>
                                        <div>
                                            <h3 class="track-title addition">Shape Of you</h3>
                                            <p class="desc">Ed Shreen</p>
                                        </div>
                                    </div>
                                    <div id="waveform" class="wavesurfer"></div>
                                </div>
                                <div class="track-img">
                                    <img src="https://images.unsplash.com/photo-1604639183321-788d64c94268?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                        alt="" id="additionImg">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-s2 gap-2 border-0 mt-5 mb-0" id="myTab" role="tablist">

                                <li class="nav-item" role="presentation">

                                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true"><i class="fas fa-window-restore me-2"></i>All Musics</button>

                                </li>

                                <li class="nav-item" role="presentation">

                                    <button class="nav-link" id="mypl-tab" data-bs-toggle="tab" data-bs-target="#mypl-tab-pane" type="button" role="tab" aria-controls="mypl-tab-pane" aria-selected="true"><i class="fas fa-camera-retro me-2"></i>My Playlist</button>

                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                    <!--<h3 class="card-title">Play List</h3>-->
                                    <div class="tracks-list" id="playList">
                                        @foreach($tracks as $t => $musics)
                                        <div class="track-item d-flex align-items-center justify-content-between">
                                            <a href="{{$musics->preview_url}}" class="w-100 getMusicDetails getHref{{$t}}" data-id="{{$t}}">
                                            <div class="d-flex align-items-center">
                                                <div class="track-img-wrapper">
                                                    <img class="track-img dynamicImg{{$t}}" src="{{$musics->album->images[0]->url}}" alt="">
                                                    <input type="hidden" value="{{$musics->album->images[1]->url}}" class="dynamicCover{{$t}}">
                                                    <img class="audio-spectrum" id="grill{{$t}}" src="assets/img/gif/audio-spetrum.gif" alt="" style="display:none;">
                                                    <i class="fas fa-play play" id="p{{$t}}"></i>
                                                    <i class="fas fa-pause pause"></i>
                                                    <input type="hidden" value="{{$musics->id}}" class="musicId{{$t}}">
                                                </div>
                                                <div class="track-details">
                                                    <h5 class="track-title music_title{{$t}}">{{$musics->name}}</h5>
                                                    <i class="fas fa-play opacity-50 ms-1"></i>
                                                </div>
                                                
                                            </div>
        
                                        </a>
                                        <button class="btn btn-primary btn-small addtoplaylist" title="Add to playlist" onclick="return myFunction();" data-id="{{$t}}"><i class="fas fa-list-ul"></i></button>
                                        </div>
                                        @endforeach
                                        </a>
                                    </div>    
                                </div>
                                <div class="tab-pane fade" id="mypl-tab-pane" role="tabpanel" aria-labelledby="mypl-tab" tabindex="0">
                                    <div class="tracks-list" id="playList">
                                        @foreach($playlists as $tx => $playlist)
                                        <div class="track-item d-flex align-items-center justify-content-between">
                                            <a href="{{$playlist->music_src}}" class="w-100 getMusicDetails getHref{{$tx}}" data-id="{{$tx}}">
                                                <div class="d-flex align-items-center">
                                                    <div class="track-img-wrapper">
                                                        <img class="track-img dynamicImg{{$tx}}" src="{{$playlist->images}}" alt="">
                                                        <input type="hidden" value="{{$playlist->images}}" class="dynamicCover{{$tx}}">
                                                        <img class="audio-spectrum" id="grill{{$tx}}" src="assets/img/gif/audio-spetrum.gif" alt="" style="display:none;">
                                                        <i class="fas fa-play play" id="p{{$tx}}"></i>
                                                        <i class="fas fa-pause pause"></i>
                                                        <input type="hidden" value="{{$playlist->musicId}}" class="musicId{{$tx}}">
                                                    </div>
                                                    <div class="track-details">
                                                        <h5 class="track-title music_title{{$tx}}">{{$playlist->music_title}}</h5>
                                                        <i class="fas fa-play opacity-50 ms-1"></i>
                                                    </div>
                                                    
                                                </div>
        
                                            </a>
                                        </div>
                                        @endforeach
                                        </a>
                                    </div>    
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('business.layouts.footer')
<script>
function myFunction() {
  if(!confirm("Are you sure to add this?"))
  event.preventDefault();
}
</script>