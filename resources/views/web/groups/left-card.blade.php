<div class="col-lg-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                @if(!empty($group->groupImageUrl))
                        <img src="{{asset('http://127.0.0.1:8000/'.$group->groupImageUrl??'')}}" class="profil-pic me-3" style = "width: 20%;">
                        @else
                        <img src="" alt="" class="card-img">
                        @endif
                
                <div>
                    <h4 class="card-title">{{$group->groupName??""}}</h4>
                    <p class="status">
                        @if(isset($group->groupPrivacy) == 'Public')
                        <i class="fas fa-lock-open active"></i>
                        <span class="mx-2">Public group</span>
                        @elseif(isset($group->groupPrivacy) == 'Private')
                        <i class="fas fa-lock active"></i>
                        <span class="mx-2">Private group</span>
                        @endif
                        <span> {{count($group->groupMembersCounts)}} </span>
                        members
                    </p>
                </div>
            </div>
            <div class="dropdown mb-5">
                <button class="btn btn-outline dropdown-toggle w-100 mt-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-cog mx-2"></i>
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
                        <a class="dropdown-item" href="{{url('add-member/'.$groupId)}}"><i class="fa fa-plus"></i>Add Member</a>

                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url('group/edit/'.$groupId)}}"><i class="fa fa-pen"></i>Edit Group</a>

                    </li>
                </ul>

            </div>
            <h4 class="card-title mb-4">Group Requests</h4>
            <ul class="members group-list">
                @foreach($group->groupInvitations as $invitation)
                <div class="list-item">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-warpper">
                                <div class="d-flex align-items-start flex-column w-100">
                                    <div class="d-flex align-items-center">
                                        @if(isset($invitation->user->profileImageUrl))
                                        <img src="{{asset('userdoc/'.$invitation->user->profileImageUrl )}}" class="profil-pic">
                                        @else
                                        <img src="{{asset('libraries/latest-assets/images/person.jpg' )}}" class="profil-pic">
                                        @endif
                                        <a href="#">
                                            <h3 class="title">{{$invitation->user->userName ??""}}</h3>
                                            <p class="description">{{$invitation->user->bio ??""}} has invited you to join this group.</p>
                                        </a>
                                    </div>
                                    <div class="custom-btn-group w-100">
                                        <a href="{{url('group/'.$groupId.'/accept/'.$invitation->user->userId)}}" class="btn btn-primary btn-small w-100">Accept</a>
                                        <a href="{{url('group/'.$groupId.'/decline/'.$invitation->user->userId)}}" class="btn btn-outline btn-small w-100">Decline</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </ul>
        </div>
             <!-- include widget here falak naz 
             include widget here falak naz  -->
    </div>
</div> 