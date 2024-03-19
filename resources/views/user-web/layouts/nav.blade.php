@php
use App\Models\Business;
use App\Models\MstUser;
use App\Models\Notifications;
use App\Models\Friend;
use App\Models\MstAuthorization;
use App\Models\Chats;
$chats = Chats::all();


$userDetail=\Auth::user() ?? "";

$userDetail=\Auth::user() ?? "";
if(Auth::User()->userTypeId==1){
    $profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";
    $userName=$userDetail->getUserDetail->userName ?? "";
    $loggedIn=$userDetail->getUserDetail->userId ?? "";
}else{
    $profileImage=$userDetail->getBusinessDetail->logoImageUrl ?? "";
    $loggedIn=$userDetail->getBusinessDetail->businessId ?? "";
}
$profileUrl='http://127.0.0.1:8000/'.$profileImage;
$notifications = Notifications ::where('receiverId', $loggedIn)->get();
$getFriendsList = Friend::where('userId', $loggedIn)->get();
$friendDetail = [];
        $friendNames=[];
        $followeId = [];
        foreach ($getFriendsList as $list) {
            $followeId[] = $list->followerId;
        }
        $checkUserType = MstAuthorization::whereIn('userId', $followeId)->get();
        foreach ($checkUserType as $user) {
            if ($user->userTypeId == 1) {
                $friendDetail[] = MstUser::where('userId', $user->userId)->get();
            } else if ($user->userTypeId == 2) {
                $friendDetail[] = Business::where('businessId', $user->userId)->get();
            }
        }
@endphp

<nav class="navbar navbar-expand-lg navbar-dark row r">

    <div class="col-3">
        <div class="d-flex align-items-center gap-2">
            <button class="navbar-toggler shadow-none border-0 p-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{route('dashboard')}}">
                <img src="{{asset('assets/img/svg/happiverse-logo-bold.svg')}}" alt="">

            </a>
        </div>

    </div>

    <div class="col-12 col-lg-6 order-2">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">

                    <a class="nav-link  {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{route('dashboard')}}" title="Home">

                        <img class="dark" src="{{asset('assets/img/svg/home-ico.svg')}}" alt="">

                        <!--<img class="dark" src="assets/img/svg/home-stroke.svg" alt="">-->
                        <h6>{{__('msg.home')}}</h6>

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ request()->is('friends') ? 'active' : '' }}" href="{{route('friends')}}" title="Friends">

                        <img class="dark" src="{{asset('assets/img/svg/friends-solid.svg')}}" alt="">

                        <!--<img class="dark" src="assets/img/svg/friends-light.svg" alt="">-->
                        <h6>{{__('msg.friends')}}</h6>

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ request()->is('photos') ? 'active' : '' }}" href="{{route('photos')}}" title="Photos">

                        <img class="dark" src="{{asset('assets/img/svg/gallery-fill.svg')}}" alt="">

                        <!--<img class="dark" src="assets/img/svg/gallery-stroke.svg" alt="">-->
                        <h6>{{__('msg.photos')}}</h6>

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ request()->is('videos') ? 'active' : '' }}" href="{{route('videos')}}" title="Videos">

                        <img class="dark" src="{{asset('assets/img/svg/videos-fill.svg')}}" alt="">

                        <!--<img class="dark" src="assets/img/svg/videos-stroke.svg" alt="">-->
                        <h6>{{__('msg.videos')}}</h6>

                    </a>

                </li>
                <li class="nav-item">

                    <a class="nav-link {{ request()->is('groups') ? 'active' : '' }}" href="{{route('groups')}}" title="Groups">

                        <img class="dark" src="{{asset('assets/img/svg/groups-solid.svg')}}" alt="">

                        <!--<img class="dark" src="assets/img/svg/groups-light.svg" alt="">-->
                        <h6>{{__('msg.groups')}}</h6>

                    </a>

                </li>

            </ul>

        </div>

    </div>

    <div class="col-9 col-lg-3 order-lg-2">

        <div class="d-flex align-items-center justify-content-end gap-2">

            <div class="position-relative">
                <div id="searchResultBox" class="card search-wrapper">

                        <div class="card-body p-3">

                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">

                                <li class="nav-item" role="presentation">

                                    <button class="nav-link active" id="people-tab" data-bs-toggle="tab" data-bs-target="#people-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Peoples</button>

                                </li>

                                <li class="nav-item" role="presentation">

                                    <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#business-tab-pane" type="button" role="tab" aria-controls="business-tab-pane" aria-selected="false">Business</button>

                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="people-tab-pane" role="tabpanel" aria-labelledby="people-tab" tabindex="0">

                                    <div id="peopleListUser">
                                        @php
                                        $peoples=MstUser::where('isActive',1)->where('userId','!=',Auth::user()->getUserDetail->userId)->orderBy('addDate', 'desc')->take(5)->get();
                                        @endphp
                                        <ul>
                                            @foreach($peoples as $p => $people)
                                            <li style="list-style-type: none; padding: 6px 10px;font-size: 13px; border-bottom: 1px solid #f7f7f7;border-top: 1px solid #f7f7f7;">
                                                <a style="color: black;" href="{{url('view-profile/'.$people->userId.'/people')}}">
                                                    <div class="avatar"><img src="{{'http://127.0.0.1:8000/'.$people->profileImageUrl}}" style="width:32px ; height:32px;; margin-right:5px"><span>{{$people->userName}}</span></div>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="peopleListNewUser"></div>



                                </div>

                                <div class="tab-pane fade" id="business-tab-pane" role="tabpanel" aria-labelledby="business-tab" tabindex="0">

                                    <div id="businessListUser">
                                        @php
                                        $business=Business::where('isActive',1)->orderBy('addDate', 'desc')->take(5)->get();
                                        @endphp
                                        <ul>
                                            @foreach($business as $b => $busn)
                                                <a style="color: black;" href="{{url('view-profile/'.$busn->businessId.'/business')}}"><li style="list-style-type: none; padding: 6px 10px;font-size: 13px; border-bottom: 1px solid #f7f7f7;border-top: 1px solid #f7f7f7;">
                                                    <div class="avatar"><img src="{{'http://127.0.0.1:8000/'.$busn->logoImageUrl}}" style="width:32px ; height:32px;; margin-right:5px"><span>{{$busn->businessName}}</span></div>
                                                </li></a>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="businessListNewUser"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                <div class="custom-search custom-search-s2 input-wrapper">
                    <input id="headerSearch2" type="text" class="form-control" placeholder="Search here" name="searchPeople">
                </div>

            </div>

            <a href="#" class="custom-round-ico chat-icon" data-toggle="modal" data-target="#facialDetectModal"><img src="assets/img/svg/face-ico.svg" alt=""></a>
            <div id="chatDropdown" class="chat-dropdown">
                <a href="javascript:void(0)" class="custom-round-ico chat-icon" id="chatIcon"><img src="assets/img/svg/chat-ico.svg" alt=""></a>
                <div id="chatBox" class="chat-box card">
                    <div class="card-body p-3">
                        <h3 class="card-title">Chats</h3>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Search Name">
                        </div>
                        <ul class="chats">
                            @php
                            $n= 1;
                            @endphp
                            @foreach($friendDetail as $friend)
                            @foreach($friend as $friend)
                            <li class="list-item" >
                                <a href="javascript:void(0)" id = "messagelist{{$n}}">
                                    <div class="d-flex align-items-center gap-2">
                                         @if($friend->getTable() =='mstuser')
                                            @php
                                            $friendImage=$friend->profileImageUrl ?? '';
                                            $url='http://127.0.0.1:8000/'.$friendImage;
                                            $n = $n+1;
                                            @endphp
                                            <img class="user-img" src="{{$url}}">
                                            <div>
                                                <h3 class="title">{{$friend->userName ?? ''}}</h3>
                                                <p class="timeline">Active <span>1h</span> ago</p>
                                            </div>
                                            @elseif($friend->getTable() =='mstbusiness')
                                            @php
                                            $busienssImage=$friend->logoImageUrl ?? '';
                                            $urlBusiness='http://127.0.0.1:8000/'.$busienssImage;
                                            $n = $n+1;
                                            @endphp
                                            <img class="user-img" src="{{$urlBusiness}}">
                                            <div>
                                                <h3 class="title">{{$friend->businessName ?? ''}} (Business)</h3>
                                                <p class="timeline">Active <span>1h</span> ago</p>
                                            </div>
                                            @endif
                                    </div>
                                </a>


                            </li>
                            @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="message-wrapper">
                <!-- <a href="#" class="compose-message"><i class="far fa-edit"></i></a> -->
                @php
                $n= 0;
                @endphp
                @foreach($friendDetail as $friend)
                @foreach($friend as $friend)
                    @php
                        $friendImage=$friend->profileImageUrl ?? $friend->logoImageUrl??'';
                        $url='http://127.0.0.1:8000/'.$friendImage;
                        $n = $n+1;
                    @endphp
                <div id="chatSingleBox{{$n}}" class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="d-flex align-items-center gap-2">
                                    <img src="{{$url}}" alt="" class="user-img">
                                    <div>
                                        <h3 class="user-name">{{$friend->userName ?? $friend->businessName ??""}}</h3>
                                        <p class="lead">Active 1 h ago</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">View Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Block</a></li>
                                    <li><a class="dropdown-item" href="#">Mute Notifications</a></li>
                                </ul>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <a href="" class="icon"><i class="fas fa-phone-alt"></i></a>
                                {{--<a href="" class="icon"><i class="fas fa-video"></i></a>--}}


                                    <button type = "button" class="icon" onclick = "placeCall('{{$friend->userId}}','{{$friend->userName}}')"><i class="fas fa-video" ></i></button>



                                <a id="closeChatSingleBox{{$n}}" href="javascript:void(0)" class="icon"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="message-content-wrapper">

                            @foreach($chats as $chat)
                            @php
                            $sender = $chat->sender_id;
                            $reciever = $chat->receiverId;
                            @endphp

                            @if($chat->sender_id == $friend->userId  )
                            @if($chat->message == "")
                            @else
                            <div class="message-item sent">
                                <div class="message">
                                    <div class="d-flex gap-2">
                                        <img src="{{$url}}" alt="" class="user-img">
                                        <div class="text-wrapper">
                                            <p class="comment-text">{{$chat->message}}</p>
                                        </div>
                                    </div>

                                    <div class="dropdown dropstart">
                                    <ul class="dropdown-menu">


                                        <li><button class="dropdown-item chat_remove" id = "chat_remove" value = "{{$chat->id}}">Remove</button></li>

                                    </ul>
                                    <button type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                </div>
                                </div>

                            </div>
                            @endif
                            @if(!empty($chat->image))
                            <div class="message-item sent">
                                <div class="message">
                                    <div class="text-wrapper" >
                                        <div class="d-flex gap-2">
                                        <img src="{{$url}}" alt="" class="user-img">
                                        <div class="text-wrapper">
                                            <img src = "{{url(''.$chat->image)}}" style = "width:100px">

                                        </div>
                                    </div>
                                            </div>
                                </div>
                            </div>
                            @endif
                            @elseif($chat->receiverId == $friend->userId )
                            @if($chat->message == "")
                            @else
                            <div class="message-item reply">

                                <div class="message">
                                    <div class="dropdown dropstart">
                                    <button type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">

                                        <li><button class="dropdown-item chat_remove" id = "chat_remove" value = "{{$chat->id}}" >Remove</button></li>

                                    </ul>
                                    </div>


                                    <div class="text-wrapper" >
                                            <p class="comment-text">{{$chat->message}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($chat->image))
                            <div class="message-item reply">
                                <div class="message">
                                    <div class="dropdown dropstart">
                                    <button type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">

                                        <li><button class="dropdown-item chat_remove" id = "chat_remove" value = "{{$chat->id}}" >Remove</button></li>

                                    </ul>
                                    </div>
                                    <div class="text-wrapper" >
                                        <img src = "{{url(''.$chat->image)}}" style = "width:100px">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @endforeach


                            <div  id= "reply">
                            </div>

                            <div  id= "sent">
                            </div>


                        </div>

                        <div id= "chatbox"></div>
                        <form  action = "{{url('/dashboard')}}" id="submitform" method = "post"  enctype="multipart/form-data">
                            @csrf
                        <div>
                            <div class="chat-file-uploader"></div>
                            <div class="d-flex align-items-end gap-2 p-2">
                            <svg class="" height="20px" viewBox="0 -1 17 17" width="20px"><g fill="none" fill-rule="evenodd"><path d="M2.882 13.13C3.476 4.743 3.773.48 3.773.348L2.195.516c-.7.1-1.478.647-1.478 1.647l1.092 11.419c0 .5.2.9.4 1.3.4.2.7.4.9.4h.4c-.6-.6-.727-.951-.627-2.151z" class="xsrhx6k"></path><circle cx="8.5" cy="4.5" r="1.5" class="xsrhx6k"></circle><path d="M14 6.2c-.2-.2-.6-.3-.8-.1l-2.8 2.4c-.2.1-.2.4 0 .6l.6.7c.2.2.2.6-.1.8-.1.1-.2.1-.4.1s-.3-.1-.4-.2L8.3 8.3c-.2-.2-.6-.3-.8-.1l-2.6 2-.4 3.1c0 .5.2 1.6.7 1.7l8.8.6c.2 0 .5 0 .7-.2.2-.2.5-.7.6-.9l.6-5.9L14 6.2z" class="xsrhx6k"></path><path d="M13.9 15.5l-8.2-.7c-.7-.1-1.3-.8-1.3-1.6l1-11.4C5.5 1 6.2.5 7 .5l8.2.7c.8.1 1.3.8 1.3 1.6l-1 11.4c-.1.8-.8 1.4-1.6 1.3z" stroke-linecap="round" stroke-linejoin="round" class="x1dmfqyo"></path></g></svg>
                            <span class="message-control" >
                            <label><span class="fas fa-plus-circle"></span><input type="file" class="upload-attachment" name="image" accept=".png, .jpg, .jpeg, .gif, .zip, .rar, .txt" hidden></label>
                            </span>
                            <label for="chatfile" class="message-control"><i class="fas fa-paperclip"></i></label>

                            <span class="message-control" id= emoji><i class="fas fa-smile"></i>

                            </span>
                            <input type = "hidden" name ="receiverId" value ="{{$friend->userId }}">
                            <textarea type="text" rows="1" class="form-control auto-height-textarea" id = "message" placeholder="Type your message here" name = "message"></textarea>

                            <button type = "submit" class="message-control">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <g id="share.light" transform="translate(-0.013)">
                            <path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#1c2233"></path>
                        </g>
                    </svg>
                            </button>

                        </div>
                        </div>
                        </form>

                    </div>
                </div>
                @endforeach
                @endforeach
</div>

            <div class="notification-dropdown" id="notificationDropdown">
                <a id="notificationIco" class="custom-round-ico" href="javascript:void(0)"><img src="assets/img/svg/notification-ico.svg" alt=""></a>
                <div class="notification-box card" id="notificationBox">
                    <div class="card-body p-3">
                        <h3 class="card-title">Notifications</h3>
                        <ul class="notifications-list">
                            @if(!empty($notifications))
                            @foreach($notifications as $notification)
                            <li class="list-item">
                                <a href="{{url('postModal/234')}}">
                                    <div class="d-flex align-items-center gap-2">
                                        @php
                                        $img = $notification->sender->profileImageUrl??$notification->business->logoImageUrl??"";
                                        @endphp
                                        <img src= {{'http://127.0.0.1:8000/'.$img}} alt=""
                                            class="user-img">
                                        <div>
                                            <p class="card-text"><b class="me-1">{{$notification->sender->userName??$notification->business->businessName??""}}</b>{{$notification->subject??""}}<b class="ms-1">{{$notification->body??""}}</b></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="user-controls">
                <span id="userImgDropdown" href="" class="user-img online" style="cursor:pointer">
                    <img src="{{$profileUrl}}" alt="">
                </span>
                <div id="userDropdown" class="custom-user-dropdown">
                    <div class="card">
                        <div class="card-body">
                            <a class="mb-3 d-block" href="">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="user-img">
                                        <img src="{{$profileUrl}}" alt="">
                                    </div>
                                    <h3 class="card-title">{{$userName}}</h3>
                                </div>
                            </a>
                            <h5 class="card-text mb-2">{{__('msg.account')}}</h5>
                            <ul class="user-dropdown-list mb-3">

                                <li class="list-item">
                                    <a href="#langModal" data-bs-toggle="modal">
                                        <h3 class="card-title"><img src="assets/img/svg/dropdown-language.svg" alt="">{{__('msg.languages')}}</h3>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#locationModal" data-bs-toggle="modal">
                                        <h3 class="card-title"><img src="assets/img/svg/dropdown-location.svg" alt="">{{__('msg.location')}}</h3>
                                    </a>
                                </li>

                            </ul>
                            <h5 class="card-text mb-2">{{__('msg.standard_policy')}}</h5>
                            <ul class="user-dropdown-list mb-0">
                                <li class="list-item">
                                    <a href="https://www.hapiverse.com/terms_of_service.html">
                                        <h3 class="card-title"><img src="assets/img/svg/dropdown-terms.svg" alt="">Terms and Conditions</h3>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="http://127.0.0.1:8000/data_policy.html">
                                        <h3 class="card-title"><img src="assets/img/svg/dropdown-language.svg" alt="">{{__('msg.data_policy')}}</h3>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="http://127.0.0.1:8000/privacy_policy.html">
                                        <h3 class="card-title"><img src="assets/img/svg/dropdown-privacy.svg" alt="">{{__('msg.privacy_policy')}}</h3>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="https://www.hapiverse.com/about_hapiverse.html">
                                        <h3 class="card-title"><img src="{{asset('assets/img/svg/dropdown-about.svg')}}" alt="">{{__('msg.about_hapiverse')}}</h3>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="{{route('logout.perform')}}">
                                        <h3 class="card-title"><img src="assets/img/svg/dropdown-logout.svg" alt="">{{__('msg.logout')}}</h3>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

</nav>
