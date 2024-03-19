@php
$user=Auth::user();
$userDetail=$user->getUserDetail ?? '';
$images=$userDetail->postImages;
@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')



<section>
    <div class="container">
        <div class="row" id="page-contents">
            @include('home.short-cuts')

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="groups-tab" data-bs-toggle="tab" data-bs-target="#groups-tab-pane" type="button" role="tab" aria-controls="groups-tab-pane" aria-selected="true">Groups</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="invitations-tab" data-bs-toggle="tab" data-bs-target="#invitations-tab-pane" type="button" role="tab" aria-controls="invitations-tab-pane" aria-selected="false">Invites</button>
                                </li>
                            </ul>

                            <div class="d-flex align-items-center">
                                <div class="custom-search">
                                    <input type="text" class="form-control" placeholder="Search Groups">
                                </div>
                                <a href="{{route('group.create')}}" class="btn btn-outline btn-small">Create Group</a>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="groups-tab-pane" role="tabpanel" aria-labelledby="groups-tab" tabindex="0">
                                <ul class="members">
                                    @foreach($getGroupsList as $list)
                                    <div class="list-item">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="profile-warpper">
                                                    <div class="d-flex align-items-center">
                                                        @if(isset($member->user->profileImageUrl))
                                                        <img src="{{asset('userdoc/'.$member->user->profileImageUrl )}}" class="profil-pic">
                                                        @else
                                                        <img src="{{asset('libraries/latest-assets/images/person.jpg' )}}" class="profil-pic">
                                                        @endif
                                                        <a href="#">
                                                            <h3 class="title mb-1">{{$list->groupName}}</h3>
                                                            <p class="description"><span>{{$list->groupPrivacy}} . </span>{{$list->groupMembers()->count()}} Members</p>
                                                        </a>
                                                    </div>
                                                    <div class="custom-btn-group">
                                                        <a href="" class="btn btn-primary d-none">Join</a>
                                                        <a href="{{url('groups/'.$list->groupId)}}" class="btn btn-primary">Show Post</a>
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
                                    @foreach($getGroupsList as $invite)
                                    <div class="list-item">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="profile-warpper">
                                                    <div class="d-flex align-items-center justify-content-between w-100">
                                                        <div class="d-flex align-items-center">
                                                            @if(isset($invite->user->profileImageUrl))
                                                            <img src="{{asset('userdoc/'.$member->user->profileImageUrl )}}" class="profil-pic">
                                                            @else
                                                            <img src="{{asset('libraries/latest-assets/images/person.png' )}}" class="profil-pic">
                                                            @endif
                                                            <a href="#">
                                                                <h3 class="title">{{$invite->user->userName ??""}}</h3>
                                                                <p class="description">{{$invite->user->bio ??""}} has invited you to join this group.</p>
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

                        <!-- <div class="groups">
                            <span><i class="fa fa-users"></i> Groups</span>
                            <a href="{{route('group.create')}}"><i class="fa fa-plus"></i>Create</span>
                        </div> -->

                    </div>
                </div>
            </div><!-- centerl meta -->

        </div>
    </div>
</section>


@include('web.layouts.footer')