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

                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <ul class="nav nav-tabs nav-tabs-s2" id="myTab" role="tablist">

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link active" id="groups-tab" data-bs-toggle="tab" data-bs-target="#groups-tab-pane" type="button" role="tab" aria-controls="groups-tab-pane" aria-selected="true">Groups</button>

                                    </li>

                                    <li class="nav-item" role="presentation">

                                        <button class="nav-link" id="invitations-tab" data-bs-toggle="tab" data-bs-target="#invitations-tab-pane" type="button" role="tab" aria-controls="invitations-tab-pane" aria-selected="false">Invites</button>

                                    </li>

                                </ul>



                                <div class="d-flex align-items-center">

                                    <div class="custom-search me-2">

                                        <input id="myInput" type="text" class="form-control" placeholder="Search Groups">

                                    </div>

                                    <a href="{{route('group.create')}}" class="btn btn-light btn-small">{{__('msg.create_group')}}</a>

                                </div>

                            </div>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="groups-tab-pane" role="tabpanel" aria-labelledby="groups-tab" tabindex="0">

                                    <ul class="members">

                                        @foreach($getGroupsList as $list)
                                        @php
                                        $url=$list->groupImageUrl;
                                        @endphp
                                        <div class="list-item filter_">

                                            <div class="card">

                                                <div class="card-body">

                                                    <div class="profile-warpper">

                                                        <div class="d-flex align-items-center">



                                                            <img src="{{'http://127.0.0.1:8000/'.$url}}" class="profil-pic">



                                                            <a href="#">

                                                                <h3 class="title mb-1">{{$list->groupName}}</h3>

                                                                <p class="description"><span>{{$list->groupPrivacy}} . </span>{{$list->groupMembers()->count()}} Members</p>

                                                            </a>

                                                        </div>

                                                        <div class="custom-btn-group" style="">

                                                            <a href="" class="btn btn-primary d-none">Join</a>

                                                            <a href="{{url('group/edit/'.$list->groupId)}}" class="btn btn-primary btn-small">Edit Group</a>
                                                            
                                                            
                                                            <a href="{{url('groups/'.$list->groupId)}}" class="btn btn-primary btn-small">Show Post</a>

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
                                        @if(!empty($invites))

                                        @foreach($invites as $invite)

                                        <div class="list-item">

                                            <div class="card">

                                                <div class="card-body">

                                                    <div class="profile-warpper">

                                                        <div class="d-flex align-items-center justify-content-between w-100">

                                                            <div class="d-flex align-items-center">

                                                                @if(isset($invite->profileImageUrl))

                                                                <img src="http://127.0.0.1:8000/{{$invite->profileImageUrl}}" class="profil-pic">

                                                                @else

                                                                <img src="{{asset('libraries/latest-assets/images/person.png' )}}" class="profil-pic">

                                                                @endif

                                                                <a href="#">

                                                                    <h3 class="title">{{$invite->userName??''}} </h3>

                                                                    <p class="description">has invited you to join this group.</p>

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

</div>


  @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.footer')
                @else
                    @include('business.layouts.footer')
                    @endif
<script>
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".filter_").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>