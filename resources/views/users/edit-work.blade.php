@php
$user=Auth::user();
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
								<div class="editing-info">
									<h5 class="f-title"><i class="ti-info-alt"></i> Edit Work Information</h5>
									@include('auth.partials.messages')
									<form method="post" action="{{ route('work-information.update') }}">
										@csrf
										<div class="checkbox">
											<label>
												<input type="checkbox" checked="checked" value="1" name="current_working"><i class="check-box"></i>Currently Working
											</label>
										</div>

										<div class="form-group">
											<input type="hidden" name="userId" value="{{$user->getUserDetail->userId}}" action="{{ route('basic-information') }}">
											<input type="text" id="input" name="title" value="{{$user->getUserDetail->occupation[0]->title}}" />
											<label class="control-label" for="input">Work at</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group half">
											<input type="Date" required="required" name="startDate" value="{{$user->getUserDetail->occupation[0]->startDate}}" />
											<label class="control-label" for="input">From</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group half">
											<input type="Date" required="required" name="endDate" value="{{$user->getUserDetail->occupation[0]->endDate}}" />
											<label class="control-label" for="input">To</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group">
											<input type="text" required="required" name="location" value="{{$user->getUserDetail->occupation[0]->location}}" />
											<label class="control-label" for="input">Location</label><i class="mtrl-select"></i>
										</div>

										<div class="form-group">
											<textarea rows="4" id="textarea" required="required" name="description">{{$user->getUserDetail->occupation[0]->description}}</textarea>
											<label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
										</div>
										<div class="submit-btns">
											<a href="{{route('dashboard')}}" class="mtr-btn"><span>Cancel</span></a>
											<button type="submit" class="mtr-btn"><span>Update</span></button>
										</div>
									</form>
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
@include('web.layouts.footer')