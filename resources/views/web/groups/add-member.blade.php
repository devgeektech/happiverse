@php
$user=Auth::user();
$userDetail=$user->getUserDetail ?? '';
$images=$userDetail->postImages;
$userIntrest=$user->getUserDetail->userIntrests ?? '';
$profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";


@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')

<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row" id="page-contents">

                <div class="col-lg-3">
                    <div class="card sticky-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('libraries/images/portrait/profile-dummy.png')}}" class="profil-pic me-3">
                                <div>
                                    <h4 class="card-title">{{$group->groupName}}</h4>
                                    <p class="status">
                                        @if($group->groupPrivacy == 'Public')
                                        <i class="fas fa-lock-open active"></i>
                                        <span class="mx-2">Public group</span>
                                        @elseif($group->groupPrivacy == 'Private')
                                        <i class="fas fa-lock active"></i>
                                        <span class="mx-2">Private group</span>
                                        @endif
                                        <span> {{count($group->groupMembersCounts)}} </span>
                                        members
                                    </p>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline dropdown-toggle w-100 mt-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-check mx-2"></i>
                                    <span>
                                        Settings
                                    </span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>

                                        @if(\Auth::user()->getUserDetail->userId == $group->groupAdminId)
                                        <a class="dropdown-item" href="{{url('group/delete/'.$groupId)}}"><i class="fa fa-trash"></i>Group Delete</a>
                                        @else
                                        <a class="dropdown-item" href="{{url('group/'.$groupId.'/leave')}}"><i class="fa fa-sign-out"></i>Group Leave</a>

                                        @endif
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""><i class="fa fa-plus"></i>Add Member</a>

                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""><i class="fa fa-pen"></i>Edit Group</a>

                                    </li>
                                </ul>
                            </div>
                            <ul class="side-menu">
                                <li>
                                    <a href="" title="Post">
                                        <i class="ti-dashboard"></i>
                                        Group Invites
                                    </a>
                                </li>



                            </ul><!-- Shortcuts -->
                        </div>
                        <!-- include widget here falak naz -->
                        <!-- include widget here falak naz -->
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="post-tab-pane" role="tabpanel" aria-labelledby="post-tab" tabindex="0">

                            <div class="card create-post-wrapper">
                                <form method="post" action="{{route('add-member.update',$groupId)}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="groupId" value="{{$groupId}}">

                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            @if(isset($user->getUserDetail->profileImageUrl))
                                            <img src="{{asset('userdoc/'.$user->getUserDetail->profileImageUrl)}}" class="profil-pic">
                                            @else
                                            <img src="{{asset('libraries/latest-assets/images/person.png' )}}" class="profil-pic">

                                            @endif
                                            <select name="memberId[]" class="form-control" multiple>
                                               
                                                @foreach( $userList as $user)
                                                <option value="{{$user->userId}}">{{$user->userName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-uploaders">


                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>

                        </div>



                    </div>

                    <!-- Results -->


                </div><!-- centerl meta -->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">About</h4>

                            <p>{{$group->groupDescription}}</p>
                            <p>{{$group->groupName}}</p>
                            <p>{{$group->groupPrivacy}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@include('web.layouts.footer')