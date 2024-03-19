@php
$userDetail=\Auth::user() ?? "";
$profileImage= $userDetail->getUserDetail->profileImageUrl ?? "";
$profileUrl='http://127.0.0.1:8000/'.$profileImage;
@endphp
@include('user-web.layouts.head')

@include('user-web.layouts.header')



<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="card user-profile-card">

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="user-img active">
                            <img src="{{$profileUrl}}" alt=""></label>

                            <!--<div class="custom-img-uploader" data-bs-toggle="modal" data-bs-target="#updateProfileImg" title="upload photo">-->
                            <!--                    <img src="assets/img/svg/reupload.svg" alt="">-->
                            <!--                </div>-->




                            </div>

                            <div class="verified active text-center">

                                <h3 class="card-title text-center">{{$loggedIn->userName ?? ""}}</h3>

                                <img src="assets/img/png/verified.png" alt="">
                                <span class="ms-2"><a data-bs-toggle="modal" data-bs-target="#edit-profile" title="Edit Profile"><i class="fa fa-edit"></i></a></span>
                            </div>


                        </div>

                        <div class="col-md-8">

                            <div class="d-flex align-items-center justify-content-end mb-4 gap-2">

                                 <button class="btn btn-light" type="button" data-bs-toggle="modal"
                                            data-bs-target="#userProfileActions">
                                            <i class="">Stealth</i>
                                        </button>



                            </div>

                            <div class="d-flex align-items-center gap-4">

                                <a href="">

                                    <h3 class="title"> {{(count($posts))}}<span>Posts</span></h3>

                                </a>

                                <a data-bs-toggle="modal" data-bs-target="#followers" title="Edit Profile">

                                    <h3 class="title" >{{count($getFriendsList)}}<span>Followers</span></h3>

                                </a>

                                <a data-bs-toggle="modal" data-bs-target="#following" title="Edit Profile">

                                    <h3 class="title">{{count($friendDetail)}}  <span>Following</span></h3>

                                </a>

                            </div>

                            <ul class="nav nav-tabs nav-tabs-s2 gap-2 border-0 mt-5 mb-0" id="myTab" role="tablist">

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

                                    <button class="nav-link" id="plans-tab" data-bs-toggle="tab" data-bs-target="#plans-tab-pane" type="button" role="tab" aria-controls="groups-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-users me-2"></i>Plans</button>

                                </li>

                                <li class="nav-item" role="presentation">

                                    <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane" type="button" role="tab" aria-controls="about-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-info-circle me-2"></i>About</button>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-4">

                    <div class="card profile-card d-none d-lg-block">

                        <div class="card-body">

                            <h3 class="card-title">About</h3>

                            <p class="card-text"> {{$loggedIn->bio ?? ""}} </p>

                            <ul class="list-icons-s1">

                                <!-- <li class="list-item">

                            <i class="fas fa-info-circle me-2"></i> -->



                                <li class="list-item">

                                    <i class="fas fa-map-marker-alt"></i>

                                    <p>{{$loggedIn->city ?? ""}} , {{$loggedIn->country ?? ""}}</p>

                                </li>

                                <li class="list-item">

                                    <i class="fas fa-birthday-cake"></i>

                                    <p>{{$loggedIn->DOB ?? ""}}</p>

                                </li>

                                <li class="list-item">

                                    <i class="fas fa-phone-alt"></i>

                                    <p>{{$loggedIn->phoneNo ?? ""}}</p>

                                </li>

                                <li class="list-item">

                                    <i class="fas fa-list-ul"></i>

                                    <p>Dancing Club</p>

                                </li>

                                <li class="list-item">

                                    <i class="fas fa-list-ul"></i>

                                    <p>Selected Plan :{{$logged->choosedPlan->plan->planName ?? ''}}</p>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="card friends-card d-none d-lg-block">

                        <div class="card-body">

                            <h3 class="card-title">Friend Suggestions</h3>
                            @foreach($friendDetail as $friend)
                                @foreach($friend as $friend)

                                @php
                                array_push($friendNames,$friend->userName );
                                @endphp
                                @endforeach
                            @endforeach
                            <ul class="friends-list">

                                        @foreach($users as $user)
                                            @php

                                            if($user->userName == $loggedIn->userName){
                                            continue;
                                            }
                                            if (in_array($user->userName, $friendNames))
                                            {
                                            continue;
                                            }

                                            @endphp
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="/friendProfile/{{$user->userId}}">

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

                <div class="col-lg-8">

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade active show" id="timeline-tab-pane" role="tabpanel" aria-labelledby="timeline-tab" tabindex="0">

                            @foreach($posts as $post)

                            <div class="card post-card">

                                <div class="card-header">

                                    <div class="info-wrapper">

                                        <div class="d-flex align-items-center gap-2">

                                            <img src="{{$profileUrl}}" alt="" class="profile-pic">

                                            <div>

                                                <h3 class="title">{{ $post->user->userName}}</h3>

                                                <p class="timeline">10h<span class="ms-1"><i class="fas fa-globe-americas"></i></span>

                                                </p>

                                            </div>

                                        </div>

                                        <a href="" class="more-option " data-bs-toggle="dropdown" aria-expanded="true"><img src="assets/img/svg/more-light.svg" alt=""></a>

                                        <ul class="dropdown-menu dropdown-menu-end" data-popper-placement="top-end" data-popper-reference-hidden="" style="position: absolute; inset: auto 0px 0px auto; margin: 0px; transform: translate(0px, -26px);">
                                        <ul>
                                                <li><a href="{{url('/post/Delete/'.$post->postId)}}" class="dropdown-item" type="button">Delete</a></li>

                                        </ul>
                                    </div>

                                    <p class="post-text">{{$post->caption}}</p>

                                </div>


                                    <div  id="postModel" class="card-body" data-bs-toggle="modal"
                data-bs-target="#post{{$post->postId}}" data-url="{{ route('postModal',['id'=>$post->postId])}}">

                                    <div class="post-slider">
                                        @if(!empty($post-> text_back_ground))
                                         <div style = " width : 100%; height:100%; min-height: 500px; background-size:cover; background-image: url({{asset($post->text_back_ground)}});" class ="card-img4">
                                                <div style = "color:white;position: absolute; top: 50%;
    left: 50%; transform: translate(-50%, -50%); text-align: center; font-size: 22px;">
                                                     {{ $post-> caption}}
                                                </div>

                                             </div>
                                        @endif
                                        @foreach ($post->postImage as $image)


                                            @php
                                            $fileName = $image->postFileUrl;
                                            $fileNameParts = explode('.', $fileName);
                                            $ext = end($fileNameParts);
                                            @endphp
                                            @if($ext == "jpg" || $ext == "png" || $ext == "webp" || $ext == "jpeg")
                                            <div>
                                                <img src="http://127.0.0.1:8000/{{$image->postFileUrl}}" alt="">
                                            </div>
                                            @endif
                                            @if($ext == "mp4" || $ext == "MOV")
                                            <div>
                                                <video src="http://127.0.0.1:8000/{{$image->postFileUrl}}" alt="" class="card-img" controls></video>
                                            </div>
                                            @endif





                                        @endforeach

                                    </div>

                                </div>



                                <div class="card-footer">

                                    <div class="action-center">

                                        <ul class="icons-wrapper">

                                            <li class="list-item">
                                                @php
                                                $class = "heart";
                                                foreach($post->postlikes as $likedUsers){
                                                if($likedUsers->userId == $loggedIn->userId){
                                                $class = "heart active";
                                                }

                                                }

                                                @endphp


                                                <button  id = "likedBtn" class="{{$class}} "value= "{{$post->postId}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.673" height="17.215" viewBox="0 0 19.673 17.215">

                                                        <g id="heart-light" transform="translate(0.001 -2)">

                                                            <path stroke="#1c2233" id="heartPath" data-name="Path 146" d="M9.4,19.031a.614.614,0,0,0,.875,0l7.865-7.969A5.328,5.328,0,0,0,14.424,2c-2.8,0-4.086,2.058-4.587,2.443C9.334,4.057,8.056,2,5.25,2a5.326,5.326,0,0,0-3.714,9.062Z" transform="translate(0 0)" fill="transparent" />

                                                        </g>

                                                    </svg>
                                                </button>

                                            </li>

                                            <li class="list-item">

                                                <button id = "commentDisplay"  data-toggle="model" data-target="#commentModal" data-url="{{ route('dynamicModal',['id'=>$post->postId])}}">

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
                                        <div id="dynamic-content"></div>

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
                                        <div id="check{{$post->postId}}model">
                                        @foreach($post->postLikes as $like)

                                            <span class="list-item"><img src="http://127.0.0.1:8000/{{$like->user->profileImageUrl??''}}" alt=""></span>

                                        @endforeach
                                        </div>
                                          </ul>

                                        <p class="likes-status">Liked by <b id="counts{{$post->postId}}model">{{ count($post->postLikes)}}</b></p>

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
                                @foreach($postFile as $img)

                                <div class="col-lg-4">
                                    <a id="postModel"   data-bs-toggle="modal" data-bs-target="#post{{$img->postId??''}}" data-url="{{ route('postModal',['id'=>$img->postId??'0'])}}">
                                        <div class="img-wrapper">
                                            @php


                                            if(!empty($img->postFileUrl)){
                                            $url='http://127.0.0.1:8000/'.$img->postFileUrl;
                                            $extention=pathinfo($img->postFileUrl, PATHINFO_EXTENSION);
                                            }
                                            else{
                                            $extention = "";
                                            }

                                            @endphp
                                            @if($extention=="png" || $extention=="jpg"|| $extention=="jpeg" )
                                            <img src="{{$url}}" alt="">
                                            @endif
                                        </div>

                                    </a>

                                </div>


                                @endforeach



                            </div>





                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="videos-tab-pane" role="tabpanel" aria-labelledby="videos-tab" tabindex="0">

                            <div class="card">

                                <div class="card-body">

                                    <h3 class="card-title">Videos</h3>

                                    @foreach($postVideo as $vid)
                                        <div class="card">

                                        <div class="card-body p-0">

                                                @php

                                                $extention=pathinfo($vid->postFileUrl, PATHINFO_EXTENSION);
                                                $url='http://127.0.0.1:8000/'.$vid->postFileUrl ?? '';
                                                @endphp

                                                @if($extention=="mp4" || $extention=="mov")

                                                <div class="video-wrapper">

                                                    <video height="350" style="width: 100%; object-fit: contain; background-color: #000;" controls src="{{$url}}" alt=""></video>

                                                </div>
                                                <div class="col-lg-4">

                                                    <a href="">



                                                    </a>

                                                </div>

                                                @endif

                                        </div>

                                    </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="friends-tab-pane" role="tabpanel" aria-labelledby="friends-tab" tabindex="0">

                            <div class="card friends-card">

                                <div class="card-body">

                                    <h3 class="card-title">Friends</h3>
                                    <ul class="friends-list">

                                @foreach($friendDetail as $friend)
                                @foreach($friend as $friend)
                                @php
                                $table=$friend->getTable();
                                @endphp

                                <li class="list-item">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <a class="d-flex align-items-center gap-2" href="/friendProfile/{{$friend->userId}}">
                                            @if($friend->getTable() =='mstuser')
                                            @php
                                            $friendImage=$friend->profileImageUrl ?? '';
                                            $url='http://127.0.0.1:8000/'.$friendImage;
                                            @endphp
                                            <img class="user-img" src="{{$url}}">
                                            <div>
                                                <h3 class="title">{{$friend->userName ?? ''}}</h3>
                                            </div>
                                            @elseif($friend->getTable() =='mstbusiness')
                                            @php
                                            $busienssImage=$friend->logoImageUrl ?? '';
                                            $urlBusiness='http://127.0.0.1:8000/'.$busienssImage;
                                            @endphp
                                            <img class="user-img" src="{{$urlBusiness}}">
                                            <div>
                                                <h3 class="title">{{$friend->businessName ?? ''}} (Business)</h3>
                                            </div>
                                            @endif
                                        </a>
                                        <a href="{{url('unfriend/'.$friend->userId ?? '')}}" class="btn btn-primary btn-small">Unfriend</a>
                                    </div>
                                </li>
                                @endforeach
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

                                            <li class="nav-item" role="presentation">

                                                <button class="nav-link" id="invitations-tab" data-bs-toggle="tab" data-bs-target="#invitations-tab-pane" type="button" role="tab" aria-controls="invitations-tab-pane" aria-selected="false">Invites</button>

                                            </li>

                                        </ul>

                                        <div class="d-flex align-items-center">

                                            <div class="custom-search">

                                                <input type="text" class="form-control" placeholder="Search Groups">

                                            </div>

                                            <a href="" class="btn btn-light">Create Group</a>

                                        </div>

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

                                        <div class="tab-pane fade" id="invitations-tab-pane" role="tabpanel" aria-labelledby="invitations-tab" tabindex="0">

                                            <ul class="members group-list">

                                                <pre></pre>
                                                @if(!empty($invites))
                                                @foreach($invites as $invite)


                                                <div class="list-item">

                                                    <div class="card">

                                                        <div class="card-body">

                                                            <div class="profile-warpper">

                                                                <div class="d-flex align-items-center justify-content-between w-100">

                                                                    <div class="d-flex align-items-center">

                                                                        <img src="http://127.0.0.1:8000/{{$invite->profileImageUrl}}"  class="profil-pic">

                                                                        <a href="#">

                                                                            <h3 class="title">{{$invite->userName}} </h3>

                                                                            <p class="description">has invited

                                                                                you to join this group.</p>

                                                                        </a>

                                                                    </div>

                                                                    <div class="custom-btn-group ">

                                                                        <a href="" class="btn btn-primary btn-small ">Accept</a>

                                                                        <a href="" class="btn btn-outline btn-small ">Decline</a>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                                @endforeach
                                                @endif
                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="plans-tab-pane" role="tabpanel" aria-labelledby="plans-tab" tabindex="0">

                            <div class="card profile-card">

                                 <div class="plans-slider plans-slider-s2">




                                    <div class="slider-item">
                                    <div class="card" style= "background-color:#808080b3; margin-top:40px; color:white">
                                        <div class="card-body">

                                            <h3 class="card-title" style="color:white">Basic Plan</h3>
                                            <h3 class="price" style="color:white"><sub class="fs-6">free</sub></h3>
                                                <li>Location Based Info's</li>
                                                <li>Public & Private Groups</li>
                                                <li> Push Notificaions Alerts</li>
                                                <li>Covid-19 tracking-local tracking
Multi Language</li>
                                                <li> Matching Algorithem</li>
                                               <li> Video Audio Voice Text Chat</li>


                                            <ul class="list-icons-s1 text-start mb-4">

                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead"></p>
                                                </li>

                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe.get')}}" class="btn btn-primary w-100">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <div class="slider-item">
                                    <div class="card" style= "background-color:#0080008c; margin-top:40px; color:white">
                                        <div class="card-body">

                                            <h3 class="card-title" style="color:white">Platinum Plan</h3>
                                            <h3 class="price" style="color:white"><sub class="fs-6">$9.99/MO</sub></h3>
                                                <li>Location Based Info's</li>
                                                <li>Public & Private Groups</li>
                                                <li> Push Notificaions Alerts</li>
                                                <li>Covid-19 tracking-local tracking
Multi Language</li>
                                                <li> Matching Algorithem</li>
                                                <li> Video Audio Voice Text Chat</li>
                                                <li>Sponsor 100 basic and 500 gold plan</li>
                                                <li> Profile Avatar</li>
                                                <li>Rate / Review</li>
                                                <li>Customer Loyalty Program</li>



                                            <ul class="list-icons-s1 text-start mb-4">

                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead"></p>
                                                </li>

                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe.get')}}" class="btn btn-primary w-100">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="slider-item">
                                    <div class="card" style= "background-color:#f9899d; margin-top:40px; color:white">
                                        <div class="card-body">

                                            <h3 class="card-title" style="color:white">Diamond Plan</h3>
                                           <h3 class="price" style="color:white"><sub class="fs-6">$29.99/MO</sub></h3>
                                                <li>Location Based Info's</li>
                                                <li>Public & Private Groups</li>
                                                <li> Push Notificaions Alerts</li>
                                                <li>Covid-19 tracking-local tracking
Multi Language</li>
                                                <li> Matching Algorithem</li>
                                                <li> Video Audio Voice Text Chat</li>
                                                <li>Sponsor 100 basic and 500 gold plan</li>
                                                <li> Profile Avatar</li>
                                                <li>Rate / Review</li>
                                                <li>Customer Loyalty Program</li>
                                                <li>Photo Album </li>



                                            <ul class="list-icons-s1 text-start mb-4">

                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead"></p>
                                                </li>

                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe.get')}}" class="btn btn-primary w-100">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="slider-item">
                                    <div class="card" style= "background-color:black; margin-top:40px; color:white">
                                        <div class="card-body">

                                            <h3 class="card-title" style="color:white">Vip/Celiberity Plan</h3>
                                           <h3 class="price" style="color:white"><sub class="fs-6">$49.99/MO</sub></h3>
                                                <li>Location Based Info's</li>
                                                <li>Public & Private Groups</li>
                                                <li> Push Notificaions Alerts</li>
                                                <li>Covid-19 tracking-local tracking
Multi Language</li>
                                                <li> Matching Algorithem</li>
                                                <li> Video Audio Voice Text Chat</li>
                                                <li>Sponsor 100 basic and 500 gold plan</li>
                                                <li> Profile Avatar</li>
                                                <li>Rate / Review</li>
                                                <li>Customer Loyalty Program</li>
                                                <li> Photo Album Stealth and ghosting</li>

                                            <ul class="list-icons-s1 text-start mb-4">

                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead"></p>
                                                </li>

                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe.get')}}" class="btn btn-primary w-100">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab" tabindex="0">

                            <div class="card profile-card">

                                <div class="card-body">

                                    <div class="d-flex align-items-center justify-content-between">

                                        <h3 class="card-title">Personal Info</h3>

                                        <!--<a href="" class="btn btn-light btn-small">Edit Info</a>-->

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">

                                            <ul class="nav nav-tabs vertical-tabs" id="myTab" role="tablist">

                                                <li class="nav-item" role="presentation">

                                                    <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic-tab-pane" type="button" role="tab" aria-controls="basic-tab-pane" aria-selected="true">

                                                        <i class="fas fa-info-circle me-2"></i>Basic

                                                        Info</button>

                                                </li>

                                                <li class="nav-item" role="presentation">

                                                    <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="true">

                                                        <i class="fas fa-info-circle me-2"></i>

                                                        Education

                                                    </button>

                                                </li>

                                                <li class="nav-item" role="presentation">

                                                    <button class="nav-link" id="work-tab" data-bs-toggle="tab" data-bs-target="#work-tab-pane" type="button" role="tab" aria-controls="work-tab-pane" aria-selected="false" tabindex="-1">

                                                        <i class="fas fa-user-graduate me-2"></i>Work </button>

                                                </li>

                                                <li class="nav-item" role="presentation">

                                                    <button class="nav-link" id="interests-tab" data-bs-toggle="tab" data-bs-target="#interests-tab-pane" type="button" role="tab" aria-controls="interests-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-thumbs-up me-2"></i></i>Interests</button>

                                                </li>

                                            </ul>

                                        </div>

                                        <div class="col-md-8">

                                            <div class="tab-content" id="myTabContent">

                                                <div class="tab-pane fade active show" id="basic-tab-pane" role="tabpanel" aria-labelledby="basic-tab" tabindex="0">

                                                    <p class="card-text">{{$loggedIn->userName ?? ''}}</p>

                                                    <p class="card-text">Live In {{$loggedIn->city ?? ''}} ,{{$loggedIn->country ?? ''}}</p>

                                                    <p class="card-text">{{$loggedIn->phoneNo ?? ''}}</p>

                                                    <p class="card-text">{{$loggedIn->hairColor ?? ''}}</p>

                                                    <p class="card-text">{{$loggedIn->religion ?? ''}}</p>

                                                    <p class="card-text">{{$loggedIn->DOB ?? ''}}</p>

                                                </div>

                                                <div class="tab-pane fade" id="education-tab-pane" role="tabpanel" aria-labelledby="education-tab" tabindex="0">

                                                    <p class="card-text">

                                                    <ul class="education">

                                                        @foreach($loggedIn->education as $education)



                                                        <i class="ti-facebook"></i>

                                                        <p class="card-text"> {{$education->title ?? ""}} from {{$education->location ?? ""}}</p>



                                                        @endforeach

                                                    </ul>

                                                    </p>

                                                </div>

                                                <div class="tab-pane fade" id="work-tab-pane" role="tabpanel" aria-labelledby="work-tab" tabindex="0">

                                                    <p class="card-text"><a href="#" title="">{{$loggedIn->occupation[0]->title ?? '' }}</a>

                                                    <p class="card-text">work as {{$loggedIn->occupation[0]->description ?? ''}}

                                                        from {{$user->getUserDetail->occupation[0]->startDate ?? ''}}</p>



                                                    </p>

                                                </div>



                                                <div class="tab-pane fade" id="interests-tab-pane" role="tabpanel" aria-labelledby="interests-tab" tabindex="0">



                                                    @foreach($userIntrest as $userInt)



                                                    <p class="card-text">{{$userInt->interest[0]->intrestCategoryTitle}} </p>

                                                    @endforeach



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
<div class="modal fade" id="edit-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('saveUserProfile')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-wrapper file-uploader">
                        <div class="card-img" style="text-align: center;">
                            <label for='profile_image'>
                            <img style="height: 100px;width: 100px; border-radius:50%" src="{{$profileUrl}}" alt="" class="card-img">
                            <i class="fas fa-camera"></i>
                            </label>
                            <input type = "file" class ="d-none" id = "profile_image" name ="profile_image">
                        </div>
                    </div>
                    <div class="slick-item">
                        <h3 class="step-title">Personal Info</h3>
                        <div class="input-wrapper">
                            <input type="text" name="profileName" class="form-control" placeholder="Profile Name" value="{{$loggedIn->userName}}" required>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" name="city" class="form-control" placeholder="City" value="{{$loggedIn->city}}">
                        </div>
                        <div class="input-wrapper">
                            <input type="text" name="country" class="form-control" placeholder="Country" value="{{$loggedIn->country}}">
                        </div>
                        <div class="input-wrapper">
                            <input disabled type="text" class="form-control" placeholder="Phone" value="{{$loggedIn->phoneNo}}">
                        </div>
                    </div>
                    <div id="accordion">
                      <div class="card">
                        <a style="color: black;text-decoration: none;text-align: left;" class="btn btn-link form-control" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Education
                        </a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            <div class="slick-item">
                                <div class="input-wrapper">
                                    <input type="text" id="createEducationTitle" class="form-control"
                                        placeholder="Work Title" value="{{$education->title}}" name="title">
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="input-wrapper">
                                        <label for="createStartYear" class="form-label">Start Year</label>
                                        <input type="date" name="startDate" id="createStartYear" class="form-control"
                                            placeholder="Start Year" value="{{$education->startDate}}">
                                    </div>
                                    <div class="input-wrapper">
                                        <label for="createEndYear" class="form-label">End Year</label>
                                        <input type="date" name="endDate" id="createEndYear" class="form-control"
                                            placeholder="End Title" value="{{$education->endDate}}">
                                    </div>
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="createCountry" class="form-control"
                                        placeholder="Level" value="{{$education->level}}" name="level">
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="createEduLocation" class="form-control"
                                        placeholder="Location" name="location" value="{{$education->location}}">
                                </div>
                                <div class="form-check form-switch input-wrapper">
                                    <label class="form-check-label form-label" for="createStudyStatus">Currently
                                        Studying</label>
                                        @if($education->currently_studying==1)
                                        <input class="form-check-input" id="createStudyStatus" type="checkbox"
                                        role="switch" checked name="currently_studying" value="1">
                                        @else
                                        <input class="form-check-input" id="createStudyStatus" type="checkbox"
                                        role="switch" name="currently_studying" value="0">
                                        @endif

                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <a style="color: black;text-decoration: none;text-align: left;" class="btn btn-link form-control" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          Occupation
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            <div class="slick-item">
                                <div class="input-wrapper">
                                    <input type="text" id="createEducationTitle" class="form-control"
                                        placeholder="Work Title" value="{{$occupation->title}}" name="occupation_title">
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="createOccDesc" class="form-control"
                                        placeholder="Occupation Description" name="occupation_description" value="{{$occupation->description}}">
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="input-wrapper">
                                        <label for="createStartYear" class="form-label">Start Year</label>
                                        <input type="date" name="occupation_startDate" id="createStartYear" class="form-control"
                                            placeholder="Start Year" value="{{$occupation->startDate}}">
                                    </div>
                                    <div class="input-wrapper">
                                        <label for="createEndYear" class="form-label">End Year</label>
                                        <input type="date" name="occupation_endDate" id="createEndYear" class="form-control"
                                            placeholder="End Title" value="{{$occupation->endDate}}">
                                    </div>
                                </div>
                                <div class="input-wrapper">
                                    <input type="text" id="createEduLocation" class="form-control"
                                        placeholder="Location" name="occupation_location" value="{{$occupation->location}}">
                                </div>
                                <div class="form-check form-switch input-wrapper">
                                    <label class="form-check-label form-label" for="createStudyStatus">Currently
                                        Working</label>
                                        @if($occupation->current_working==1)
                                        <input class="form-check-input" id="createStudyStatus_" type="checkbox"
                                        role="switch" checked name="current_working" value="1">
                                        @else
                                        <input class="form-check-input" id="createStudyStatus_" type="checkbox"
                                        role="switch" name="current_working" value="0">
                                        @endif

                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="input-wrapper">
                        <label>Martial Status</label>
                        <select name="martialStatus" class="form-control martialStatus">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Engaged">Engaged</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                    <div class="input-wrapper">
                        <label>Gender</label>
                        <select name="gender" class="form-control gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="input-wrapper">
                        <label>Height</label>
                        <input type="text" id="createOccDesc" class="form-control" placeholder="Height" name="height" value="{{$loggedIn->height}}">
                    </div>
                    <div class="input-wrapper">
                        <b>Interests</b>
                        <div id="interest_list" class="mb-3">
                            @php
                            $interestNames = [];
                            @endphp
                        @foreach($userIntrest as $userInt)
                       @php
                       array_push($interestNames,$userInt->interest[0]->intrestCategoryTitle);
                       $delete_value = $userInt->mstUserInterestId;
                       @endphp
                        <p class="lead d-flex justify-content-between mb-2">{{$userInt->interest[0]->intrestCategoryTitle}}

                            <a href="{{url('/interest-delete/').'/'.$userInt->mstUserInterestId}}"><i class="fas fa-trash-alt me-1 text-danger"></i></a>


                        </p>
                        @endforeach
                        </div>
                        <label for="cars">Choose Interest:</label>
                            <select id="interest" class="form-control" name="cars">
                                @foreach($intrest_category as $intrestcateg)
                                @php
                                if (in_array($intrestcateg->intrestCategoryTitle, $interestNames))
                                  {
                                  continue;
                                  }
                                @endphp
                              <option  value="{{$intrestcateg->intrestCategoryTitle}}">{{$intrestcateg->intrestCategoryTitle}}</option>
                              @endforeach
                            </select>

                        <button  type = "button"class="btn btn-primary mt-4" onclick = "addInterest()">Add</button>

                    </div>

                    <div class="input-wrapper">
                        <label>Plan</label>
                        <input type="text" id="createOccDesc" class="form-control" placeholder="Height" name="height" value="{{$logged->choosedPlan->plan->planName ?? ''}}">
                    </div>
                    <div class="input-wrapper">
                        <div class="slider-box">
                            <input class="form-control" type="text" id="profileSliderInput">
                            <div id="profileInputSlider" class="slider"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Save Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="updateProfileImg" tabindex="-1" aria-labelledby="modal_success" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button role="button" aria-label="button" type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="input-wrapper">
                            <div class=" d-flex gap-2">
                                <button type="button" class="reset-input-btn btn"><i class="far fa-trash-alt"></i></button>
                                <label for="updateImgProfInput" class="custom-label custom-label-s2 custom-label-sm d-flex flex-column">
                                    <i class="fas fa-plus"></i>
                                    <span>Drag &amp; Drop your files or Browse</span>
                                </label>
                            </div>
                            <input class="d-none" type="file" id="updateImgProfInput" required="">
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Add
                              </button>
                        </div>
                        <div class="img-results single-post" id="updateProfileImgResults"><img class="" src="blob:null/8bb8c232-536e-4c01-9c43-ae5b6006736b"></div>
                    </div>
                </div>
            </div>
        </div>
<div class="modal fade" id="followers" tabindex="-1" aria-labelledby="modal_success" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                   <div class="card friends-card">

                                <div class="card-body">

                                    <h3 class="card-title">Followers</h3>
                                    <ul class="friends-list">

                                @foreach($friendDetail as $friend)
                                @foreach($friend as $friend)
                                @php
                                $table=$friend->getTable();
                                @endphp

                                <li class="list-item">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <a class="d-flex align-items-center gap-2" href="/friendProfile/{{$friend->userId}}">
                                            @if($friend->getTable() =='mstuser')
                                            @php
                                            $friendImage=$friend->profileImageUrl ?? '';
                                            $url='http://127.0.0.1:8000/'.$friendImage;
                                            @endphp
                                            <img class="user-img" src="{{$url}}">
                                            <div>
                                                <h3 class="title">{{$friend->userName ?? ''}}</h3>
                                            </div>
                                            @elseif($friend->getTable() =='mstbusiness')
                                            @php
                                            $busienssImage=$friend->logoImageUrl ?? '';
                                            $urlBusiness='http://127.0.0.1:8000/'.$busienssImage;
                                            @endphp
                                            <img class="user-img" src="{{$urlBusiness}}">
                                            <div>
                                                <h3 class="title">{{$friend->businessName ?? ''}} (Business)</h3>
                                            </div>
                                            @endif
                                        </a>
                                        <a href="{{url('unfriend/'.$friend->userId ?? '')}}" class="btn btn-primary btn-small">Unfriend</a>
                                    </div>
                                </li>
                                @endforeach
                                @endforeach

                            </ul>


                                </div>

                            </div>
                </div>
            </div>
        </div>
<div class="modal fade" id="following" tabindex="-1" aria-labelledby="modal_success" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                   <div class="card friends-card">

                                <div class="card-body">

                                    <h3 class="card-title">Following</h3>
                                    <ul class="friends-list">

                                @foreach($friendDetail as $friend)
                                @foreach($friend as $friend)
                                @php
                                $table=$friend->getTable();
                                @endphp

                                <li class="list-item">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <a class="d-flex align-items-center gap-2" href="/friendProfile/{{$friend->userId}}">
                                            @if($friend->getTable() =='mstuser')
                                            @php
                                            $friendImage=$friend->profileImageUrl ?? '';
                                            $url='http://127.0.0.1:8000/'.$friendImage;
                                            @endphp
                                            <img class="user-img" src="{{$url}}">
                                            <div>
                                                <h3 class="title">{{$friend->userName ?? ''}}</h3>
                                            </div>
                                            @elseif($friend->getTable() =='mstbusiness')
                                            @php
                                            $busienssImage=$friend->logoImageUrl ?? '';
                                            $urlBusiness='http://127.0.0.1:8000/'.$busienssImage;
                                            @endphp
                                            <img class="user-img" src="{{$urlBusiness}}">
                                            <div>
                                                <h3 class="title">{{$friend->businessName ?? ''}} (Business)</h3>
                                            </div>
                                            @endif
                                        </a>
                                        <a href="{{url('unfriend/'.$friend->userId ?? '')}}" class="btn btn-primary btn-small">Unfriend</a>
                                    </div>
                                </li>
                                @endforeach
                                @endforeach

                            </ul>


                                </div>

                            </div>
                </div>
            </div>
        </div>

<button class="btn btn-primary" id="header-bg">+</button>

@include('user-web.layouts.footer')
<script>
    $('.gender').val('{{$loggedIn->gender}}');
    $('.martialStatus').val('{{$loggedIn->martialStatus}}');
</script>
