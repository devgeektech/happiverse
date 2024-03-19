@php
use App\Models\PostImages;
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
                <div class="col-lg-6">
                    <div class="card business-single-card">
                        <div class="card-img">
                            <img src="{{'http://127.0.0.1:8000/'.$image}}" alt="" class="card-img">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="user-img online">
                                    <img src="{{'http://127.0.0.1:8000/'.$image}}" alt="" class="img">
                                </div>
                            </div>
                            
                            <h3 class="card-title mb-3">{{$name}}</h3>
                            @if($ownerName!='')<h4 class="subtitle">{{$ownerName}}</h4>@endif
                            <div class="d-flex align-items-center justify-content-center gap-4">
                                <ul class="ratings">
                                    <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item active"><i class="fas fa-star"></i></li>
                                    <li class="list-item"><i class="fas fa-star"></i></li>
                                </ul>
                                </br>
                            </div>
                            <div class="card-title mb-3" style = "font-size : 13px">
                                Write a Review
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-4">
                                <a href="">
                                    <h3 class="title">{{count($posts)}}<span>Posts</span></h3>
                                </a>
                                <a href="">
                                    <h3 class="title">{{$totalFollowers}} <span>Followers</span></h3>
                                </a>
                                <a href="">
                                    <h3 class="title">{{$totalFollowing}} <span>Following</span></h3>
                                </a>
                            </div>
                            <ul class="list-icons-s1">
                                <li class="list-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>{{$loggedIn->address}} .{{$loggedIn->city}} ,{{$loggedIn->Country}}</p>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <p>{{$phoneNo}}</p>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-list-ul"></i>
                                    <p>{{$loggedIn->email}}</p>
                                </li>
                                
                            </ul>
                            <ul class="nav nav-tabs nav-tabs-s2 gap-2 border-0 mt-4 mb-0 justify-content-center justify-content-md-start" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="timeline-tab" data-bs-toggle="tab" data-bs-target="#timeline-tab-pane" type="button" role="tab" aria-controls="timeline-tab-pane" aria-selected="true"><i class="fas fa-window-restore me-2"></i>Timeline</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos-tab-pane" type="button" role="tab" aria-controls="photos-tab-pane" aria-selected="true"><i class="fas fa-camera-retro me-2"></i>Photos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#videos-tab-pane" type="button" role="tab" aria-controls="videos-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-video me-2"></i>Videos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends-tab-pane" type="button" role="tab" aria-controls="friends-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-user-friends me-2"></i>Friends</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="groups-tab" data-bs-toggle="tab" data-bs-target="#groups-tab-pane" type="button" role="tab" aria-controls="groups-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-users me-2"></i>Groups</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products-tab-pane" type="button" role="tab" aria-controls="plans-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-boxes me-2"></i>Products</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#events-tab-pane" type="button" role="tab" aria-controls="plans-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-boxes me-2"></i>Events</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="timeline-tab-pane" role="tabpanel" aria-labelledby="timeline-tab" tabindex="0">

                            @foreach($posts as $post)
                            <div class="card post-card">
                                <div class="card-header">
                                    <div class="info-wrapper">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{'http://127.0.0.1:8000/'.$image}}" alt="" class="profile-pic">
                                            <div>
                                                <h3 class="title">{{$name}}</h3>
                                                <p class="timeline">10h<span class="ms-1"><i class="fas fa-globe-americas"></i></span>
                                                </p>
                                            </div>
                                        </div>
                                        <a href="" class="more-option"><img src="assets/img/svg/more-light.svg" alt=""></a>
                                    </div>
                                    <p class="post-text">{{$post->caption}}</p>
                                </div>
                                <div class="card-body">
                                    <div class="post-slider">
                                        @foreach ($post->postImage as $image)
                                        @php
                                        $fileName = $image->postFileUrl;
                                        $fileNameParts = explode('.', $fileName);
                                        $ext = end($fileNameParts);
                                        @endphp
                                        @if ($ext == "jpg" || $ext == "png" || $ext == "webp" || $ext == "jpeg")
                                        <div>
                                            <img src="{{'http://127.0.0.1:8000/'.$image->postFileUrl}}" alt="">
                                        </div>
                                        @else
                                        <div>
                                            <video controls src="{{'http://127.0.0.1:8000/'.$image->postFileUrl}}" alt=""> </video>
                                        </div>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="action-center">
                                        <ul class="icons-wrapper">
                                            <li class="list-item">
                                                <button class="heart" href="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.673" height="17.215" viewBox="0 0 19.673 17.215">
                                                        <g id="heart-light" transform="translate(0.001 -2)">
                                                            <path stroke="#1c2233" id="heartPath" data-name="Path 146" d="M9.4,19.031a.614.614,0,0,0,.875,0l7.865-7.969A5.328,5.328,0,0,0,14.424,2c-2.8,0-4.086,2.058-4.587,2.443C9.334,4.057,8.056,2,5.25,2a5.326,5.326,0,0,0-3.714,9.062Z" transform="translate(0 0)" fill="transparent" />
                                                        </g>
                                                    </svg>
                                                </button>
                                            </li>
                                            <li class="list-item">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#commentAccordion" aria-expanded="true" aria-controls="commentAccordHead">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.906" height="17.215" viewBox="0 0 20.906 17.215">
                                                        <g id="comment-light" transform="translate(0 -0.5)">
                                                            <path id="Path_147" data-name="Path 147" d="M16.619.5H4.287A4.292,4.292,0,0,0,0,4.787v6.622a4.218,4.218,0,0,0,3.033,4.055L5.1,17.535a.612.612,0,0,0,.866,0l1.9-1.9h8.749a4.292,4.292,0,0,0,4.287-4.287V4.787A4.292,4.292,0,0,0,16.619.5Zm3.062,10.848a3.066,3.066,0,0,1-3.062,3.062h-9a.613.613,0,0,0-.433.179L5.537,16.236,3.784,14.483a.612.612,0,0,0-.285-.161,3,3,0,0,1-2.274-2.913V4.787A3.066,3.066,0,0,1,4.287,1.725H16.619a3.066,3.066,0,0,1,3.062,3.062Zm0,0" fill="#1c2233" />
                                                            <path id="Path_148" data-name="Path 148" d="M154.148,144.328H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0" transform="translate(-139.806 -137.955)" fill="#1c2233" />
                                                            <path id="Path_149" data-name="Path 149" d="M154.148,197.352H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0" transform="translate(-139.806 -188.814)" fill="#1c2233" />
                                                        </g>
                                                    </svg>
                                                </button>
                                            </li>
                                            <li class="list-item">
                                                <button class="share-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512.00102" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m361.824219 344.394531c-24.53125 0-46.632813 10.59375-61.972657 27.445313l-137.972656-85.453125c3.683594-9.429688 5.726563-19.671875 5.726563-30.386719 0-10.71875-2.042969-20.960938-5.726563-30.386719l137.972656-85.457031c15.339844 16.851562 37.441407 27.449219 61.972657 27.449219 46.210937 0 83.804687-37.59375 83.804687-83.804688 0-46.210937-37.59375-83.800781-83.804687-83.800781-46.210938 0-83.804688 37.59375-83.804688 83.804688 0 10.714843 2.046875 20.957031 5.726563 30.386718l-137.96875 85.453125c-15.339844-16.851562-37.441406-27.449219-61.972656-27.449219-46.210938 0-83.804688 37.597657-83.804688 83.804688 0 46.210938 37.59375 83.804688 83.804688 83.804688 24.53125 0 46.632812-10.59375 61.972656-27.449219l137.96875 85.453125c-3.679688 9.429687-5.726563 19.671875-5.726563 30.390625 0 46.207031 37.59375 83.800781 83.804688 83.800781 46.210937 0 83.804687-37.59375 83.804687-83.800781 0-46.210938-37.59375-83.804688-83.804687-83.804688zm-53.246094-260.589843c0-29.359376 23.886719-53.246094 53.246094-53.246094s53.246093 23.886718 53.246093 53.246094c0 29.359374-23.886718 53.246093-53.246093 53.246093s-53.246094-23.886719-53.246094-53.246093zm-224.773437 225.441406c-29.363282 0-53.25-23.886719-53.25-53.246094s23.886718-53.246094 53.25-53.246094c29.359374 0 53.242187 23.886719 53.242187 53.246094s-23.882813 53.246094-53.242187 53.246094zm224.773437 118.949218c0-29.359374 23.886719-53.246093 53.246094-53.246093s53.246093 23.886719 53.246093 53.246093c0 29.359376-23.886718 53.246094-53.246093 53.246094s-53.246094-23.886718-53.246094-53.246094zm0 0" fill="#1c2233" data-original="#1c2233" class="">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                        <a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 25 25" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                <g>
                                                    <g id="Layer_21" data-name="Layer 21">
                                                        <path d="M18.21,2H6.79A2.83,2.83,0,0,0,4,4.86V21.2a1.67,1.67,0,0,0,1,1.54,1.57,1.57,0,0,0,1.74-.27l5.35-4.74a.69.69,0,0,1,.86,0l5.35,4.74a1.59,1.59,0,0,0,1.74.27,1.67,1.67,0,0,0,1-1.54V4.86A2.83,2.83,0,0,0,18.21,2ZM20,21.2a.67.67,0,0,1-.39.63.61.61,0,0,1-.67-.1L13.59,17a1.69,1.69,0,0,0-2.18,0L6.06,21.73a.61.61,0,0,1-.67.1A.67.67,0,0,1,5,21.2V4.86A1.83,1.83,0,0,1,6.79,3H18.21A1.83,1.83,0,0,1,20,4.86Z" fill="#000000" data-original="#000000">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="likes-wrapper">
                                        <ul class="likes-list">
                                            <li class="list-item"><img src="assets/img/png/profile-1.png" alt=""></li>
                                            <li class="list-item"><img src="assets/img/png/profile-1.png" alt=""></li>
                                            <li class="list-item"><img src="assets/img/png/profile-1.png" alt=""></li>
                                        </ul>
                                        <p class="likes-status">Liked by <b>Will Smith</b> and <b>1,993
                                                other</b></p>
                                    </div>
                                    <div id="commentAccordion" class="accordion-collapse collapse mb-3" aria-labelledby="headingOne" data-bs-parent="#commentAccordHead">
                                        <div class="accordion-body">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="text" class="form-control" placeholder="Add Comment Here">
                                                <a href="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g id="share.light" transform="translate(-0.013)">
                                                            <path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#1c2233" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comments-wrapper">
                                        <div>
                                            <p class="comment-text"><span>Becca John</span> Lorem ipsum
                                                dolor
                                                sit amet
                                                consectetur adipisicing elit. Modi, quasi?</p>
                                            <a class="comment-control" href="">Reply</a>
                                        </div>
                                    </div>
                                    <div class="custom-share-box">
                                        <div class="card">
                                            <div class="card-body">
                                                <ul class="sharing-links">
                                                    <li class="list-item"><a href=""><i class="far fa-window-restore me-1"></i>Share
                                                            in
                                                            Timeline</a></li>
                                                    <li class="list-item"><a href=""><i class="fab fa-facebook-messenger me-1"></i>Share
                                                            in
                                                            messenger</a></li>
                                                    <li class="list-item"><a href=""><i class="fas fa-users me-1"></i>Share in
                                                            group</a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="photos-tab-pane" role="tabpanel" aria-labelledby="photos-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Photos</h3>
                                    <div class="row photos-gallery">
                                        @foreach($photos as $photo)

                                        @foreach($photo->userPostMedia as $img)
                                        @php
                                        $extention=pathinfo($img->postFileUrl, PATHINFO_EXTENSION);
                                        @endphp
                                        @if($extention=="jpg" || $extention=="png")
                                        <div class="col-lg-4 col-md-6">
                                            <a href="">
                                                <div class="img-wrapper">
                                                    <img src="{{'http://127.0.0.1:8000/'.$img->postFileUrl}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        @endforeach
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="videos-tab-pane" role="tabpanel" aria-labelledby="videos-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Videos</h3>
                                    <div class="row photos-gallery">
                                        @foreach($videos as $video)
                                        @foreach($video->userPostMedia as $vid)
                                        @php
                                        $extention=pathinfo($vid->postFileUrl, PATHINFO_EXTENSION);
                                        @endphp
                                        @if($extention=="mp4" || $extention=="mov")
                                        <div class="col-lg-4">
                                            <a href="">
                                                <div class="video-wrapper mb-3">
                                                    <video height="140" controls src="{{asset($vid->postFileUrl)}}" alt=""></video>
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        @endforeach
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="friends-tab-pane" role="tabpanel" aria-labelledby="friends-tab" tabindex="0">
                            <div class="card friends-card">
                                <div class="card-body">
                                    <h3 class="card-title">Friends</h3>
                                    <ul class="friends-list">
                                    @foreach($getFriendsList as $friend)
    
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="{{'http://127.0.0.1:8000/'.$friend->friend->profileImageUrl}}">
                                                    <div>
                                                        <h3 class="title">{{$friend->friend->userName}}</h3>
        
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                    <h3 class="card-title">Friends Suggestions</h3>
                                    <ul class="friends-list">
                                        @foreach($users as $user)
                                        
                                      
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                 
                                                    <img class="user-img" src="{{'http://127.0.0.1:8000/'.$user->profileImageUrl}}">
                                                    
                                                    <div>
                                                        <h3 class="title">{{$user->userName}}</h3>
        
                                                    </div>
                                                    <a href= "{{route('addfriend',[$user->userId])}}" class="btn btn-primary btn-small">
                                                        <i class="fas fa-user-plus"></i>
                                                    </a>
                                                 
                                                </a>
                                            </div>
                                        </li>
                                     @endforeach
                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="groups-tab-pane" role="tabpanel" aria-labelledby="groups-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4 flex-column flex-md-row">
                                        <ul class="nav nav-tabs nav-tabs-s2" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="groupsInner-tab" data-bs-toggle="tab" data-bs-target="#groupsInner-tab-pane" type="button" role="tab" aria-controls="groupsInner-tab-pane" aria-selected="true">Groups</button>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="groupsInner-tab-pane" role="tabpanel" aria-labelledby="groups-tab" tabindex="0">
                                            <ul class="members">

                                                @foreach($groups as $list)
                                                <div class="list-item">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="profile-warpper">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="{{asset($list->groupImageUrl)}}" class="profil-pic">
                                                                    <a href="#">
                                                                        <h3 class="title mb-1">{{$list->groupName}}</h3>
                                                                        <p class="description"><span>{{$list->groupPrivacy}} .
                                                                            </span>{{$list->groupMembers()->count()}}</p>
                                                                    </a>
                                                                </div>
                                                                <div class="custom-btn-group">
                                                                    <a href="" class="btn btn-primary btn-small d-none">Join</a>
                                                                    <a href="{{url('groups/'.$list->groupId)}}" class="btn btn-primary btn-small">Show
                                                                        Post</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        </div>
                        
                        <div class="tab-pane fade" id="products-tab-pane" role="tabpanel" aria-labelledby="plans-tab" tabindex="0">
                            <div class="card">
                               <div class="card-body"> 
                                <h3 class="card-title">Products</h3>
                                 <ul class="order-list list-unstyled">
                                     
                                    @foreach($products as $product)
                                    @php
                                    
                                    $url='http://127.0.0.1:8000/'.$product->productImage->imageUrl??'' ;
                                    @endphp
                                    <li class="list-item">
                                        @php 
                                        if(Auth::user()->userTypeId==1){$route='/hapiverse/public/orders/'.$product->productId;}else{$route='/hapiverse/public/orderDetail/'.$order->orderId;}
                                        @endphp
                                        
                                        <a href="{{$route}}">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src="{{$url}}" alt="" class="product-img">
                                                    <div>
                                                        <h3 class="product-title">{{$product->productName ?? ''}} </h3>
                                                        <p class="lead">24-Dec-2022</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="events-tab-pane" role="tabpanel" aria-labelledby="plans-tab" tabindex="0">
                            <div class="card">
                               <div class="card-body">
                                    <h3 class="card-title">Events</h3>
                                    
                                    <div class="card event-card">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <img src="http://127.0.0.1:8000/business/event/event-16745546040.jpg" alt="" class="card-img">
                                            </div>
                                   
                                            <div class="col-lg-7">
                                                <div class="card-body">
                                                    <div class="card-title">2023-01-30 at 14:00 PM</div>
                                                        <p class="title">Event Mine12</p>
                                                        <p class="lead">Event Mine12</p>
                                                    </div>
                                                </div>
                                            </div>
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
<button class="btn btn-primary" id="header-bg">+</button>
@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.footer')
@else
    @include('business.layouts.footer')
@endif
<script src="{{asset('assets/js/custom-sliders.js')}}" type="text/javascript"></script>