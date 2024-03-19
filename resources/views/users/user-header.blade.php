<section>
	<div class="feature-photo">
		<figure><img src="{{asset('libraries/latest-assets/images/images.png')}}" alt=""></figure>
		<div class="add-btn">
			<span>1205 followers</span>
			<!-- <a href="#" title="" data-ripple="">Add Friend</a> -->
		</div>
		<!-- <form class="edit-phto">
			<i class="fa fa-camera-retro"></i>
			<label class="fileContainer">
				Edit Cover Photo
				<input type="file" />
			</label>
		</form> -->
		<div class="container-fluid">
			<div class="row merged">
				<div class="col-lg-2 col-sm-3">
					<div class="user-avatar">
						<figure>
						    @php 
						    $user=Auth::user();
                            if($user->userTypeId==2){
                                $img1=$user->getBusinessDetail->profileImageUrl;
                                $src=$user->getBusinessDetail->businessId;
                                $name=$user->getBusinessDetail->businessName;
                                $namm='Business';
                            }else{
                                $img1=$user->getUserDetail->profileImageUrl;
                                $src=$user->getUserDetail->userId;
                                $name=$user->getUserDetail->userName;
                                $namm='User';
                            }
						    @endphp
							<img src="{{asset('userdoc/'.$img1)}}" alt="">
							<form class="edit-phto">
								<i class="fa fa-camera-retro"></i>
								<label class="fileContainer">
									<a href="{{route('display-image.update',$src)}}"></a>
								</label>
							</form>
						</figure>
					</div>
				</div>
				<div class="col-lg-10 col-sm-9">
					<div class="timeline-info">
						<ul>
							<li class="admin-name">
								<h5>{{$name ?? ''}}</h5>
								<span>{{$namm}}</span>

							</li>
							<li>
								<a class="{{ (request()->is('myposts')) ? 'active' : '' }}" href="{{route('myposts')}}" title="" data-ripple="">time line</a>
								<a class="{{ (request()->is('photos')) ? 'active' : '' }}" href="{{route('photos')}}" title="" data-ripple="">Photos</a>
								<a class="{{ (request()->is('videos')) ? 'active' : '' }}" href="{{route('videos')}}" title="" data-ripple="">Videos</a>
								<a class="{{ (request()->is('friends')) ? 'active' : '' }}" href="{{route('friends')}}" title="" data-ripple="">Friends</a>
								<a class="{{ (request()->is('groups')) ? 'active' : '' }}" href="{{route('groups')}}" title="" data-ripple="">Groups</a>
								<a class="{{ (request()->is('about')) ? 'active' : '' }}" href="{{route('about')}}" title="" data-ripple="">about</a>

							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- top area -->