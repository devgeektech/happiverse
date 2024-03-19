@php
use App\Models\MstUser;
use App\Models\Business;
$userDetail=\Auth::user() ?? "";
if(Auth::User()->userTypeId==1){
    $userId=\Auth::user()->getUserDetail->userId;
    $profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";

}else{
    $userId=\Auth::user()->getBusinessDetail->businessId;
    $profileImage=$userDetail->getBusinessDetail->logoImageUrl ?? "";
    $businessDetail=$userDetail->getBusinessDetail??"";
    $workingHours=$businessDetail->workingHours ??"";
    $products=$businessDetail->businessProduct ??"";

}
$profileUrl='http://127.0.0.1:8000/'.$profileImage;
@endphp
@if(Auth::User()->userTypeId==1)
@include('user-web.layouts.head')
@include('user-web.layouts.header')
@else
@include('business.layouts.head')
@include('business.layouts.header')
@endif
<div class="main-content shimmer" style="margin-top: 91px;">

    <section class="home">

        <div class="container">

            <div class="row">
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif

                <div class="col-lg-6">

                    @include('user-web.layouts.story')
                    <div class="card create-post-wrapper" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <form method="post" action=""  enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="{{$profileUrl}}" class="profil-pic">
                                    <input type="text" class="form-control" placeholder="Write Something..." name="caption">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="input-wrapper file-uploader">
                                    <label for="" class="custom-label">
                                        <i class="far fa-image"></i>
                                        Image
                                    </label>
                                    <input type="file" href="" class="d-none" id="" name="">
                                </div>
                                <div class="input-wrapper file-uploader">
                                    <label for="" class="custom-label">
                                        <i class="fas fa-video"></i>
                                        Video
                                    </label>
                                    <input type="file" href="" class="d-none" id="" name="">
                                </div>
                                <div class="input-wrapper file-uploader">
                                    <label for="" class="custom-label">
                                        <i class="fas fa-paint-roller"></i>
                                        Background
                                    </label>
                                    <input type="file" href="" class="d-none" id="" name="">
                                </div>
                            </div>
                        </form>
                    </div><!-- add post new box -->


                    <div id="posts">

                    </div>

                    <div class="loadMore">

                    </div>

                    @if(Auth::User()->userTypeId==2)
                        @foreach($results as $data => $feeds)
                        @php $user=MstUser::where('userId',$feeds->userId)->first();
                        $business = Business::where('businessId',$feeds->userId)->first();
                        $url_image = $user->profileImageUrl??$business->logoImageUrl??"";
                               $userName=$user->userName??$business->businessName??"";
                             $userPic='http://127.0.0.1:8000/'.$url_image ;
                        @endphp
                        <div class="card post-card">
                        <div class="card-header">
                            <div class="info-wrapper">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{$userPic}}" alt="" class="profile-pic">
                                    <div>

                                        <h3 class="title">{{$userName}}</h3>
                                        <p class="timeline">{{date('d-M-Y h:i A',strtotime($feeds->posted_date))}}<span class="ms-1"><i
                                                    class="fas fa-globe-americas"></i></span></p>
                                    </div>
                                </div>
                                <a href="" class="more-option"><img src="assets/img/svg/more-light.svg"
                                        alt=""></a>
                            </div>
                            <p class="post-text">{{$feeds->caption}}</p>
                        </div>
                        <div  id="postModel" class="card-body" data-bs-toggle="modal"
                data-bs-target="#post{{$feeds->postId}}" data-url="{{ route('postModal',['id'=>$feeds->postId])}}">
                            <div class="post-slider">
                                @if(!empty($feeds->text_back_ground))
                                    <div style = " width : 100%; height:100%; min-height: 500px; background-size:cover; background-image: url({{asset($feeds->text_back_ground)}});" class ="card-img3">
                                            <div style = "color:white;position: absolute; top: 50%;
    left: 50%; transform: translate(-50%, -50%); text-align: center; font-size: 22px;">
                                                 {{ $feeds-> caption}}
                                            </div>

                                    </div>
                                @endif
                                @foreach ($feeds->postImage as $image)
                                @php
                                $fileName = $image->postFileUrl;
                                $fileNameParts = explode('.', $fileName);
                                $ext = end($fileNameParts);
                                @endphp
                                @if ($ext == "jpg" || $ext == "png" || $ext == "webp" || $ext == "jpeg")
                                <div class="position-relative">
                                    <img src="{{'http://127.0.0.1:8000/'.$image->postFileUrl}}" alt="">
                                    <div class="tags">
                                                <div class="tag">
                                                    <a href="#tagUsers" data-bs-toggle="modal">
                                                        Will Pryer
                                                    </a>
                                                </div>
                                            </div>
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
                                        <button  id = "likedBtn" class="heart"value= "{{$feeds->postId}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.673" height="17.215" viewBox="0 0 19.673 17.215">

                                                        <g id="heart-light" transform="translate(0.001 -2)">

                                                            <path stroke="#1c2233" id="heartPath" data-name="Path 146" d="M9.4,19.031a.614.614,0,0,0,.875,0l7.865-7.969A5.328,5.328,0,0,0,14.424,2c-2.8,0-4.086,2.058-4.587,2.443C9.334,4.057,8.056,2,5.25,2a5.326,5.326,0,0,0-3.714,9.062Z" transform="translate(0 0)" fill="transparent" />

                                                        </g>

                                                    </svg>
                                                </button>
                                    </li>
                                    <li class="list-item">
                                        <button id = "commentDisplay"  data-toggle="model" data-target="#commentModal" data-url="{{ route('dynamicModal',['id'=>$feeds->postId])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.906"
                                                height="17.215" viewBox="0 0 20.906 17.215">
                                                <g id="comment-light" transform="translate(0 -0.5)">
                                                    <path id="Path_147" data-name="Path 147"
                                                        d="M16.619.5H4.287A4.292,4.292,0,0,0,0,4.787v6.622a4.218,4.218,0,0,0,3.033,4.055L5.1,17.535a.612.612,0,0,0,.866,0l1.9-1.9h8.749a4.292,4.292,0,0,0,4.287-4.287V4.787A4.292,4.292,0,0,0,16.619.5Zm3.062,10.848a3.066,3.066,0,0,1-3.062,3.062h-9a.613.613,0,0,0-.433.179L5.537,16.236,3.784,14.483a.612.612,0,0,0-.285-.161,3,3,0,0,1-2.274-2.913V4.787A3.066,3.066,0,0,1,4.287,1.725H16.619a3.066,3.066,0,0,1,3.062,3.062Zm0,0"
                                                        fill="#1c2233" />
                                                    <path id="Path_148" data-name="Path 148"
                                                        d="M154.148,144.328H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0"
                                                        transform="translate(-139.806 -137.955)"
                                                        fill="#1c2233" />
                                                    <path id="Path_149" data-name="Path 149"
                                                        d="M154.148,197.352H146.37a.612.612,0,1,0,0,1.225h7.778a.612.612,0,1,0,0-1.225Zm0,0"
                                                        transform="translate(-139.806 -188.814)"
                                                        fill="#1c2233" />
                                                </g>
                                            </svg>
                                        </button>
                                    </li>

                                    <li class="list-item">
                                        <a href="javascript:void(0)" class="share-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512"
                                                x="0" y="0" viewBox="0 0 512 512.00102"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m361.824219 344.394531c-24.53125 0-46.632813 10.59375-61.972657 27.445313l-137.972656-85.453125c3.683594-9.429688 5.726563-19.671875 5.726563-30.386719 0-10.71875-2.042969-20.960938-5.726563-30.386719l137.972656-85.457031c15.339844 16.851562 37.441407 27.449219 61.972657 27.449219 46.210937 0 83.804687-37.59375 83.804687-83.804688 0-46.210937-37.59375-83.800781-83.804687-83.800781-46.210938 0-83.804688 37.59375-83.804688 83.804688 0 10.714843 2.046875 20.957031 5.726563 30.386718l-137.96875 85.453125c-15.339844-16.851562-37.441406-27.449219-61.972656-27.449219-46.210938 0-83.804688 37.597657-83.804688 83.804688 0 46.210938 37.59375 83.804688 83.804688 83.804688 24.53125 0 46.632812-10.59375 61.972656-27.449219l137.96875 85.453125c-3.679688 9.429687-5.726563 19.671875-5.726563 30.390625 0 46.207031 37.59375 83.800781 83.804688 83.800781 46.210937 0 83.804687-37.59375 83.804687-83.800781 0-46.210938-37.59375-83.804688-83.804687-83.804688zm-53.246094-260.589843c0-29.359376 23.886719-53.246094 53.246094-53.246094s53.246093 23.886718 53.246093 53.246094c0 29.359374-23.886718 53.246093-53.246093 53.246093s-53.246094-23.886719-53.246094-53.246093zm-224.773437 225.441406c-29.363282 0-53.25-23.886719-53.25-53.246094s23.886718-53.246094 53.25-53.246094c29.359374 0 53.242187 23.886719 53.242187 53.246094s-23.882813 53.246094-53.242187 53.246094zm224.773437 118.949218c0-29.359374 23.886719-53.246093 53.246094-53.246093s53.246093 23.886719 53.246093 53.246093c0 29.359376-23.886718 53.246094-53.246093 53.246094s-53.246094-23.886718-53.246094-53.246094zm0 0"
                                                        fill="#1c2233" data-original="#1c2233" class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                                <!-- content will be load here -->
                                    <div id="dynamic-content"></div>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0"
                                        viewBox="0 0 25 25" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="">
                                        <g>
                                            <g id="Layer_21" data-name="Layer 21">
                                                <path
                                                    d="M18.21,2H6.79A2.83,2.83,0,0,0,4,4.86V21.2a1.67,1.67,0,0,0,1,1.54,1.57,1.57,0,0,0,1.74-.27l5.35-4.74a.69.69,0,0,1,.86,0l5.35,4.74a1.59,1.59,0,0,0,1.74.27,1.67,1.67,0,0,0,1-1.54V4.86A2.83,2.83,0,0,0,18.21,2ZM20,21.2a.67.67,0,0,1-.39.63.61.61,0,0,1-.67-.1L13.59,17a1.69,1.69,0,0,0-2.18,0L6.06,21.73a.61.61,0,0,1-.67.1A.67.67,0,0,1,5,21.2V4.86A1.83,1.83,0,0,1,6.79,3H18.21A1.83,1.83,0,0,1,20,4.86Z"
                                                    fill="#000000" data-original="#000000"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                           <div class="likes-wrapper">
                                        <ul class="likes-list">
                                        <div id="check{{$feeds->postId}}model">
                                        @foreach($feeds->postLikes as $like)

                                            <span class="list-item"><img src="http://127.0.0.1:8000/{{$like->user->profileImageUrl?? ''}}" alt=""></span>

                                        @endforeach
                                        </div>
                                          </ul>

                                        <p class="likes-status">Liked by <b id="counts{{$feeds->postId}}model">{{ count($feeds->postLikes)}}</b></p>

                                    </div>
                                    @foreach ($feeds->comment as $comment)
                                    <div class="comments-wrapper">
                                        <div class="comment-item">
                                            <div class="comment">
                                                <div class="d-flex gap-2">
                                                    <img src="http://127.0.0.1:8000/{{$comment->user->profileImageUrl?? ''}}" alt="" class="user-img">
                                                    <div>
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

                            <div id="commentAccordion" >
                                <div class="accordion-body">

                                    <form method="post" onsubmit="return post();" action=" {{url('add-comment/'.$feeds->postId) }}">
                                        @csrf
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="text" class="form-control" placeholder="Add Comment Here" name="comment">
                                            <input name="postId"  type="hidden" value="{{$feeds->postId}}">
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
                                            <li class="list-item"><a href=""><i
                                                        class="far fa-window-restore me-1"></i>Share in
                                                    Timeline</a></li>
                                            <li class="list-item"><a href=""><i
                                                        class="fab fa-facebook-messenger me-1"></i>Share in
                                                    messenger</a></li>
                                            <li class="list-item"><a href=""><i
                                                        class="fas fa-users me-1"></i>Share in group</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        @endforeach
                        <div class="loadMore">
                            We have not any more data yet
                    </div>
                    @endif

                </div>
                @if(Auth::User()->userTypeId==1)
                <div class="col-lg-3">

                    <div class="card profile-card">

                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 class="card-title mb-0">Match Alert </h3>
                                <button type="button" class="btn btn-light btn-small" data-bs-toggle="modal" data-bs-target="#covidStatus">
                                    <i class="fas fa-plus text-gray"></i>
                                </button>
                            </div>


                            <ul class="list-icons-s1">

                                <!--<li class="list-item">-->

                                <!--    <i class="fas fa-map-marker-alt"></i>-->

                                <!--    <p>{{$covid->hospitalName ?? ""}}</p>-->

                                <!--</li>-->



                                <li class="list-item">

                                    <i class="fa-solid fa-heart"></i>

                                    <p>{{$covid->covidStatus ?? ""}}</p>

                                </li>

                                <li class="list-item">

                                    <i class="fas fa-list-ul"></i>

                                    <p>{{$covid->date ?? ""}}</p>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="card chat-box">

                        <div class="card-body">

                            <h3 class="card-title">Messages</h3>

                            <div class="custom-search mb-3">

                                <input type="text" class="form-control" placeholder="Search Messages">

                            </div>

                            <ul class="nav nav-tabs nav-tabs-s2" id="myTab" role="tablist">

                                <li class="nav-item" role="presentation">

                                    <button class="nav-link active" id="chats-tab" data-bs-toggle="tab" data-bs-target="#chats-tab-pane" type="button" role="tab" aria-controls="chats-tab-pane" aria-selected="true">Chats</button>

                                </li>



                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="chats-tab-pane" role="tabpanel" aria-labelledby="chats-tab" tabindex="0">

                                    <ul class="chats">

                                        <li class="list-item">

                                            <a href="">

                                                <div class="d-flex align-items-center gap-2">

                                                    <img src="assets/img/png/profile-1.png" alt="" class="user-img">

                                                    <div>

                                                        <h3 class="title">John Doe</h3>

                                                        <p class="timeline">Active <span>1h</span> ago</p>

                                                    </div>

                                                </div>

                                            </a>

                                        </li>

                                        <li class="list-item">

                                            <a href="">

                                                <div class="d-flex align-items-center gap-2">

                                                    <img src="assets/img/png/profile-1.png" alt="" class="user-img">

                                                    <div>

                                                        <h3 class="title">John Doe</h3>

                                                        <p class="timeline">Active <span>1h</span> ago</p>

                                                    </div>

                                                </div>

                                            </a>

                                        </li>

                                        <li class="list-item">

                                            <a href="">

                                                <div class="d-flex align-items-center gap-2">

                                                    <img src="assets/img/png/profile-1.png" alt="" class="user-img">

                                                    <div>

                                                        <h3 class="title">John Doe</h3>

                                                        <p class="timeline">Active <span>1h</span> ago</p>

                                                    </div>

                                                </div>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                                <div class="tab-pane fade" id="requests-tab-pane" role="tabpanel" aria-labelledby="requests-tab" tabindex="0">...</div>

                            </div>

                        </div>

                    </div>

                </div>
                @else
                <div class="col-lg-3">
                    <div class="card profile-card">
                        <div class="card-body">
                            <h3 class="card-title">About</h3>
                            <ul class="list-icons-s1">
                                <li class="list-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>{{$businessDetail->city}}, {{$businessDetail->country}}</p>
                                </li>
                                <li class="list-item">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <i class="far fa-clock"></i>
                                                <div class="d-flex justify-content-between w-100">
                                                    <p>Monday open 24 hours</p>
                                                    <p><span>view more</span></p>

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @foreach($workingHours as $hour)
                                                <div class="d-flex justify-content-between my-1">
                                                    <p>{{$hour->day}}</p>
                                                    <p>Open: {{$hour->openTime}} </p>
                                                    <p> Close :{{$hour->closeTime}}</p>

                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <p>{{$businessDetail->businessContact}}</p>
                                </li>
                                <li class="list-item">
                                    <i class="fas fa-list-ul"></i>
                                    <p>{{$businessDetail->businessType}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

            </div>

<div class="modal fade" id="covidStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('add-covid')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Match Alert Relationship Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-wrapper">
                        <input type="hidden" name="userId" value="{{$userId}}">

                    <!--    <input type="text" id="hospitalName" class="form-control" placeholder="Hospital Name" name="hospitalName">-->
                    <!--</div>-->
                    <div class="input-wrapper">
                        <select class="form-select form-control" aria-label="Default select example" name="covidStatus">
                            <option selected disabled>Status</option>
                            <option value="Single">Single</option>
                            <option value="Engaged">Engaged</option>
                            <option value="In Love">In Love</option>
                            <option value="In a relationship">In a relationship</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                            <option value="Windowed">Windowed</option>
                        </select>
                    </div>
                    <div class="input-wrapper">
                        <input type="date" id="covidDate" class="form-control" name="date">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </div>
            </form>
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
