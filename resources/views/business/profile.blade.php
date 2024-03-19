@include('business.layouts.head')
@include('business.layouts.header')
<div class="main-content">
    <section class="home">
        <div class="container">
            <div class="row">
                @include('business.layouts.sidebar')
                <div class="col-lg-6">
                    <div class="card business-single-card">
                        <div class="card-img">
                            <img src="{{'http://127.0.0.1:8000/'.$loggedIn->logoImageUrl}}" alt="" >
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="user-img online">
                                    <img src="{{'http://127.0.0.1:8000/'.$loggedIn->logoImageUrl}}" alt="" class="img">
                                    <div class="custom-img-uploader" data-bs-toggle="modal" data-bs-target="#updateProfileImg" title="upload photo">
                                                <img src="assets/img/svg/reupload.svg" alt="">
                                            </div>

                                </div>
                            </div>
                            <!--<div class="d-flex align-items-center justify-content-end mb-4 gap-2">-->

                            <!--     <button class="btn btn-light" type="button" data-bs-toggle="modal"-->
                            <!--                data-bs-target="#userProfileActions">-->
                            <!--                <i class="fas fa-chevron-down"></i>-->
                            <!--            </button>-->

                            <!--</div>-->
                            <h3 class="card-title">{{$loggedIn->businessName}}
                                <span class="ms-2"><a data-bs-toggle="modal" data-bs-target="#edit-profile" title="Edit Profile"><i class="fa fa-edit"></i></a></span>
                            </h3>
                            <h4 class="subtitle mb-3">{{$loggedIn->ownerName}}</h4>

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
                                    <p>{{$loggedIn->businessContact}}</p>
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
                                    <button class="nav-link" id="plans-tab" data-bs-toggle="tab" data-bs-target="#plans-tab-pane" type="button" role="tab" aria-controls="plans-tab-pane" aria-selected="false" tabindex="-1"><i class="fas fa-boxes me-2"></i>Plans</button>
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
                                            <img src="{{'http://127.0.0.1:8000/'.$loggedIn->logoImageUrl}}" alt="" class="profile-pic">
                                            <div>
                                                <h3 class="title">{{$loggedIn->businessName}}</h3>
                                                <p class="timeline">10h<span class="ms-1"><i class="fas fa-globe-americas"></i></span>
                                                </p>
                                            </div>
                                        </div>
                                        <a href="" class="more-option"><img src="assets/img/svg/more-light.svg" alt=""></a>
                                    </div>
                                    <p class="post-text">{{$post->caption}}</p>
                                </div>
                                <div id="postModel" class="card-body" data-bs-toggle="modal"
                data-bs-target="#post{{$post->postId}}" data-url="{{ route('postModal',['id'=>$post->postId])}}">
                                    <div class="post-slider">
                                        @if(!empty($post->text_back_ground))
                                         <div style = " width : 100%; height:100%; min-height: 500px; background-size:cover; background-image: url({{asset($post->text_back_ground)}});" class ="card-img1">
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
                                                <button  id = "likedBtn" class="heart"value= "{{$post->postId}}">
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
                                        <div id="check{{$post->postId}}model">
                                        @foreach($post->postLikes as $like)

                                            <span class="list-item"><img src="http://127.0.0.1:8000/{{$like->user->profileImageUrl??''}}" alt=""></span>

                                        @endforeach
                                        </div>
                                          </ul>

                                        <p class="likes-status">Liked by <b id="counts{{$post->postId}}model">{{ count($post->postLikes)}}</b></p>

                                    </div>


                                    @foreach ($post->comment as $comment)
                                    <div class="comments-wrapper">
                                        <div class="comment-item">
                                            <div class="comment">
                                                <div class="d-flex gap-2">
                                                    <img src="http://127.0.0.1:8000/{{$comment->user->profileImageUrl?? ''}}" alt="" class="user-img">
                                                    <div class="w-100">
                                                        <div class="text-wrapper">
                                                            <p class="comment-text"><span class="user-title"> {{$comment->user->userName ?? ""}} </</span>{{ $comment->comment}}</p>
                                                        </div>
                                                        <a class="comment-control" href="">Reply</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    @endforeach
                                    <div id="commentAccordion">
                                        <div class="accordion-body">
                                            <form method="post" onsubmit="return post();" action=" add-comment/$post->postId ">
                                                @csrf
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="text" class="form-control" placeholder="Add Comment Here" name = "comment">
                                                <input name="postId"  type="hidden" value="{{$post->postId}}">
                                                <button type="submit" style="border: none;" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                        <g id="share.light" transform="translate(-0.013)">
                                                            <path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#1c2233" />
                                                        </g>
                                                    </svg>
                                                </button>
                                            </div>
                                            </form>
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
                                        <div class="col-lg-4 col-md-6" id="postModel" data-bs-toggle="modal"
                data-bs-target="#post{{$post->postId}}" data-url="{{ route('postModal',['id'=>$img->postId])}}">

                                                <div class="img-wrapper">

                                                    <img src="{{'http://127.0.0.1:8000/'.$img->postFileUrl}}" alt="">
                                                </div>

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
                                    <h3 class="card-title">Video</h3>

                                    @foreach($postVideo as $vid)
                                    <div class="card">

                                        <div class="card-body p-0">


                                                @php

                                                $extention=pathinfo($vid->postFileUrl, PATHINFO_EXTENSION);
                                                $url='http://127.0.0.1:8000/'.$vid->postFileUrl ?? '';
                                                @endphp

                                                @if($extention=="MP4" || $extention=="MOV")

                                                <div class="video-wrapper">

                                                    <video height="350" style="width: 100%; object-fit: contain; background-color: #000;" controls src="{{$url}}" alt=""></video>

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
                                    @foreach($getFriendsList as $friend)
                                        <li class="list-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="d-flex align-items-center gap-2" href="">
                                                    <img class="user-img" src="{{'http://127.0.0.1:8000/'.$friend->friend->profileImageUrl}}">
                                                    <div>
                                                        <h3 class="title">{{$friend->friend->userName}}</h3>

                                                    </div>
                                                </a>
                                                <a href="{{url('unfriend/'.$friend->friend->userId ?? '')}}" class="btn btn-primary btn-small">Unfriend</a>
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
                                                @foreach($groupInvites as $groupInvite)
                                                <div class="list-item">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="profile-warpper">
                                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                                    <div class="d-flex align-items-center">
                                                                        <img src="http://localhost/hapiverse/public/libraries/latest-assets/images/person.jpg" class="profil-pic">
                                                                        <a href="#">
                                                                            <h3 class="title">{{$groupInvite->user->userName?? ''}}</h3>
                                                                            <p class="description"> has
                                                                                invited
                                                                                you to join this group.
                                                                            </p>
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

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="plans-tab-pane" role="tabpanel" aria-labelledby="plans-tab" tabindex="0">
                            <div class="plans-slider plans-slider-s2">
                                    <div class="slider-item">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Local Business Plan</h3>
                                            <h3 class="price"><sub class="fs-6">$100/Year</sub></h3>
                                            <ul class="list-icons-s1 text-start mb-4">
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 50 basic accounts paid individual plans</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Rewards Center</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Covid-19 tracking-local tracking</p>
                                                </li>
                                                 <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Covid-19 tracking-local tracking</p>
                                                </li>
                                                 <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead"> Matching Algorithem</p>
                                                </li>
                                                 <li class="list-item d-flex">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 100 basic 20 platinum accounts paid individual plans activated</p>
                                                </li>
                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe')}}" class="btn btn-primary w-100">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <div class="slider-item">
                                    <div class="card">
                                        <div class="card-body">

                                            <h3 class="card-title">Reginol Business Plan</h3>
                                            <h3 class="price"><sub class="fs-6">$250/Year</sub></h3>
                                            <ul class="list-icons-s1 text-start mb-4">
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 100 basic and 5 gold plans</p>
                                                </li>
                                                 <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Rewards Center</p>
                                                </li>
                                                 <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Covid-19 tracking-local tracking</p>
                                                </li>
                                                 <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Matching Algorithem</p>
                                                </li>
                                                 <li class="list-item d-flex">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 200 basic and 40 platinum, 10 local business plans</p>
                                                </li>

                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe')}}" class="btn btn-primary w-100">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="slider-item">
                                    <div class="card">
                                        <div class="card-body">

                                            <h3 class="card-title">National Business Plan</h3>
                                           <h3 class="price"><sub class="fs-6">$500/Year</sub></h3>
                                           <ul class="list-icons-s1 text-start mb-4">
                                               <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 20 gold, and 5 Platinum user plans</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 20 gold, and 5 Platinum user plans</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Rewards Center</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Covid-19 tracking-local tracking</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Matching Algorithem</p>
                                                </li>
                                                    <li class="list-item d-flex">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 400 basic, and 50 diamond user and 50 local business, 2 regional business plans plans</p>
                                                </li>

                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe')}}" class="btn btn-primary w-100">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="slider-item">
                                    <div class="card">
                                        <div class="card-body">

                                            <h3 class="card-title">Global Business Plan</h3>
                                           <h3 class="price"><sub class="fs-6">$1000/Year</sub></h3>
                                           <ul class="list-icons-s1 text-start mb-4">
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 10 platinum and 20 V.I.P. user plans</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Rewards Center</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Covid-19 tracking-local tracking</p>
                                                </li>
                                                <li class="list-item">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Matching Algorithem</p>
                                                </li>
                                                <li class="list-item d-flex">
                                                    <i class="fas fa-check"></i>
                                                    <p class="lead">Sponsor 1000 basic and 100 Platinum, 100 diamond, 100 V.I.P/Celebrity user Plan, 100 Local, 10 Regional, 3 National Business plans</p>
                                                </li>

                                            </ul>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{route('stripe')}}" class="btn btn-primary w-100">Buy Now</a>
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
                <div class="col-lg-3">
                    <div class="card profile-card">
                        <div class="card-body">
                            <h3 class="card-title">Other Details</h3>
                            <p class="card-text">{{$loggedIn->vatNumber}}</p>
                            <p class="card-text">{{$loggedIn->businessType}}</p>
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
            <form action="{{route('saveProfile')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-wrapper file-uploader">

                        <div class="card-img" style="text-align: center;">
                            <label for = "profile_image">
                                <img style="height: 100px;width: 100px;" src="{{'http://127.0.0.1:8000/'.$loggedIn->logoImageUrl}}" alt="" class="card-img">
                            </label>
                        </div>
                        <input type = "file" name = "profile_image" id = "profile_image" class = "d-none"></input>
                    </div>
                    <div class="input-wrapper">
                        <label>Business Name</label>
                        <input type="text" name="businessName" class="form-control" placeholder="Business Name" value="{{$loggedIn->businessName}}" required>
                    </div>
                    <div class="input-wrapper">
                        <label>Owner Name</label>
                        <input type="text" name="ownerName" class="form-control" placeholder="Owner Name" value="{{$loggedIn->ownerName}}" required>
                    </div>
                    <div class="input-wrapper">
                        <label>Business Contact</label>
                        <input type="text" class="form-control" placeholder="Business Contact" value="{{$loggedIn->businessContact}}" name="phone">
                    </div>
                    <div class="input-wrapper">
                        <label>Business Hours</label>
                        <table class="table">
                            <tbody>
                        @foreach($businessHours as $hour => $bHours)
                        <tr>
                            @if($bHours->openTime==$bHours->closeTime)
                                <td>{{$bHours->day}}<td><td>Open 24 hours<td>
                            @else
                                <td>{{$bHours->day}}<td><td>{{date('h:i A',strtotime($bHours->openTime))}}-{{date('h:i A',strtotime($bHours->closeTime))}}<td>
                            @endif

                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="input-wrapper">
                        <label>Business Location</label>
                        <input type="text" class="form-control" id="business_location" placeholder="Business Location" value="{{$loggedIn->address}}" name="address">
                        <input type="hidden" id="latitude_business" name="latitude_business"><input type="hidden" id="longitude_business" name="longitude_business">
                    </div>
                    <div class="input-wrapper">
                        <iframe src="https://maps.google.com/maps?q={{$loggedIn->latitude.','.$loggedIn->longitude}}&hl=es;z=14&amp;output=embed" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="input-wrapper">
                        <b>Interests</b>
                        @foreach($userIntrest as $userInt)
                        <div class="card-text">{{$userInt->interest[0]->intrestCategoryTitle}}
                            <span class="d-flex justify-content-end">

                            <a href="{{url('/interest')}}"><i class="fas fa-trash-alt me-1 text-danger"></i></a>
                            </span>
                        </div>

                        @endforeach

                        <input type="text" id="createOccDesc" class="form-control" placeholder="Add Interest" name="interest" >
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
                    <form method = "post" action = "{{route('SaveBussinessImage')}}" enctype="multipart/form-data">
                        @csrf
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
                            <input class="d-none" type="file" id="updateImgProfInput" name = "profile_image" required="">

                        </div>
                        <div class="img-results single-post" id="updateProfileImgResults"><img class="" src="blob:null/8bb8c232-536e-4c01-9c43-ae5b6006736b"></div>
                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                Save
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
<button class="btn btn-primary" id="header-bg">+</button>
@include('business.layouts.footer')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn--OTVX-wI6fOLCSw9HN54Bwua6z8ByI&callback=initAutocomplete&libraries=places" async></script>
<script type="text/javascript">
    function initAutocomplete()
    {

        const input1 = document.getElementById("business_location");
        const options = {
            // componentRestrictions: { country: "GB" },
            fields: ["address_components", "geometry", "icon", "name"]
        };
        const autocomplete1 = new google.maps.places.Autocomplete(input1, options);

        autocomplete1.addListener("place_changed", () => {
            // debugger;
            const place = autocomplete1.getPlace();
            if (!place.geometry || !place.geometry.location) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
            // console.log(place.name);
            document.getElementById("latitude_business").value = place.geometry.location.lat();
            document.getElementById("longitude_business").value = place.geometry.location.lng();
            $("#business_location").val(place.name);

        });
    }

</script>
<style>.pac-container{z-index:99999;}</style>
