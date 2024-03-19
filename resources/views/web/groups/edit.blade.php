@php
$user=Auth::user();
$userDetail=$user->getUserDetail ?? '';
$images=$userDetail->postImages;
$userIntrest=$user->getUserDetail->userIntrests ?? '';
$profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";


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

                    <div class="card">

                        <div class="card-body">
                            

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="post-tab-pane" role="tabpanel" aria-labelledby="post-tab" tabindex="0">
                            @include('auth.partials.messages')
                            <div class="card create-post-wrapper">
                                <form method="post" action="{{ route('group.update',$groupId) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label class="control-label" for="input">Group Name</label><i class="mtrl-select"></i>
                                        <input type="hidden" name="groupId" value="{{$groupId}}" />
                                        <input type="text" id="input" name="groupName" value="{{$group->groupName}}" />
                                        
                                    </div>

                                    <div class="form-group">
                                        <textarea rows="4" id="textarea" required="required" name="groupDescription">{{$group->groupDescription}}</textarea>
                                        <i class="mtrl-select"></i>
                                    </div>
                                    <div class="submit-btns">
                                        <a href="{{route('dashboard')}}" class="mtr-btn"><span>Cancel</span></a>
                                        <button type="submit" class="mtr-btn"><span>Updat</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Results -->
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