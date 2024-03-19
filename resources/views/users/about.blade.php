@php
$user=Auth::user();
$userIntrest=$user->getUserDetail->userIntrests ?? '';

@endphp

@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')
@include('users.user-header')


<section>
	<div class="gap gray-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<div class="col-lg-3">
							@include('users.edit-info-card')

						</div><!-- sidebar -->
						<div class="col-lg-6">
							<div class="central-meta">
								<div class="about">
									<div class="personal">
										<h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
										<p>
											{{$user->getUserDetail->bios ?? ''}}
										</p>
									</div>
									<div class="d-flex flex-row mt-2">
										<ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
											<li class="nav-item">
												<a href="#basic" class="nav-link active" data-toggle="tab">Basic info</a>
											</li>

											<li class="nav-item">
												<a href="#work" class="nav-link" data-toggle="tab">Work</a>
											</li>
											<li class="nav-item">
												<a href="#education" class="nav-link" data-toggle="tab">Education</a>
											</li>
											<li class="nav-item">
												<a href="#interest" class="nav-link" data-toggle="tab">interests</a>
											</li>

										</ul>
										<div class="tab-content">
											<div class="tab-pane fade show active" id="basic">
												<ul class="basics">
													<li><i class="ti-user"></i>{{$user->getUserDetail->userName ?? ''}}</li>
													<li><i class="ti-map-alt"></i>live in {{$user->getUserDetail->city ?? ''}} ,{{$user->getUserDetail->country ?? ''}}</li>
													<li><i class="ti-mobile"></i>{{$user->getUserDetail->phoneNo ?? ''}}</li>
													<li><i class="ti-mobile"></i>{{$user->getUserDetail->hairColor ?? ''}}</li>
													<li><i class="ti-mobile"></i>{{$user->getUserDetail->religion ?? ''}}</li>
													<li><i class="ti-mobile"></i>{{$user->getUserDetail->DOB ?? ''}}</li>

													<li><i class="ti-email"></i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3c4553494e515d55507c59515d5550125f5351">{{$user->getUserDetail->email ?? ''}}</a></li>


												</ul>
											</div>

											<div class="tab-pane fade" id="work" role="tabpanel">
												<div>

													<a href="#" title="">{{$user->getUserDetail->occupation[0]->title ?? '' }}</a>
													<p>work as {{$user->getUserDetail->occupation[0]->description ?? ''}} from {{$user->getUserDetail->occupation[0]->startDate ?? ''}}</p>
													<ul class="education">
														@foreach($user->getUserDetail->education as $education)
														<li>
															<i class="ti-facebook"></i>
															{{$education->title ?? ""}} from {{$education->location ?? ""}}
														</li>
														@endforeach
													</ul>
												</div>
											</div>
											<div class="tab-pane fade" id="interest" role="tabpanel">
												<ul class="basics">
													@foreach($userIntrest as $userInt)

													<li>{{$userInt->interest[0]->intrestCategoryTitle}}</li>
													@endforeach
												</ul>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div><!-- centerl meta -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>
@include('web.layouts.footer')