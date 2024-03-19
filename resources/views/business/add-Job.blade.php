<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@if(Auth::user()->userTypeId==1)
@include('user-web.layouts.head')

@include('user-web.layouts.header')
@else
@include('business.layouts.head')
@include('business.layouts.header')
@endif

@php
if(Auth::user()->userTypeId==1){

    $user=Auth::user();
    $userDetail=$user->getUserDetail ?? '';
    $images=$userDetail->postImages;
    $userIntrest=$user->getUserDetail->userIntrests ?? '';
    $profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";    
}
else{

    
    $userDetail=Auth::user()->getBusinessDetail ?? '';
    $images=$userDetail->postImages ?? '';
    $userIntrest=$user->getBuinessDetail->userIntrests ?? '';
    $profileImage=$userDetail->getBuinessDetail->profileImageUrl ?? "";
}



@endphp
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

                            <h3 class="card-title">Create Job</h3>
                            <form method="post" action="{{ route('job.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Job Title</label><i class="mtrl-select"></i>
                                    <input class="form-control" type="text" id="input" name="jobTitle" placeholder="Job Title" required>
                                    
                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Company Name</label><i class="mtrl-select"></i>
                                    <input class="form-control" type="text" id="input" name="companyName" placeholder="Company Name" required>
                                    
                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Work Place Type</label><i class="mtrl-select"></i>
                                    <select name="workplaceType" class="form-control" required>
                                        <option value="">Select Work Place Type</option>
                                        <option value="remote">Remote</option>
                                        <option value="onsite">On Site</option>
                                        <option value="inhouse">In House</option>
                                    </select>
                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="textarea">Job Location</label><i class="mtrl-select"></i>
                                    <textarea class="form-control" rows="4" id="textarea" required="required" name="jobLocation" placeholder="Type Location"></textarea>    
                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="input">Job Type</label><i class="mtrl-select"></i>
                                    <select name="jobType" class="form-control" required>
                                        <option value="">Select Job Type</option>
                                        <option value="fulltime">Full Time</option>
                                        <option value="parttime">Part Time</option>
                                        <option value="hybrid">Hybrid</option>
                                    </select>
                                </div>
                                <div class="input-wrapper">
                                    <label class="control-label" for="textarea">Job Description</label><i class="mtrl-select"></i>
                                    <textarea class="form-control" rows="4" id="textarea" required="required" name="jobDescription" placeholder="Type Description"></textarea>    
                                </div>
                                <div class="submit-btns">
                                    
                                    <button type="submit" class="mtr-btn"><span>Save</span></button>
                                </div>
                            </form>

                        </div>

                    </div>
                    
                     <div class="card">
                         @foreach($jobs as $job)
                        <div class="card-body">
                             
                            <h3 class="card-title">
                                {{ $job-> companyName}}</h3>
                           
                            
                            <a href="">
                                <div class="card event-card">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                                <div class="card-title">{{$job->jobTitle}} ({{$job->companyName}})</div>
                                                <p class="title">{{ucfirst($job->workplaceType)}}-{{ucfirst($job->jobType)}}</p>
                                                <p class="lead">{{$job->jobLocation}}</p>
                                                <p class="lead">{{$job->jobDescription}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                                <div class="d-flex align-items-center justify-content-start"><a href="http://127.0.0.1:8000/hapiverse/public/product-details/2">
                                    </a><a data-bs-toggle="modal" data-bs-target="#edit-job{{$job->jobId}}" class="btn btn-light btn-small w-100 me-1 edit-product-data" data-id="2"><i class="far fa-edit me-1"></i></a>
                                    <a data-confirm="Are you sure?" href="http://127.0.0.1:8000/hapiverse/public/delete-job/{{$job->jobId}}" class="btn btn-light btn-small w-100 ms-1" onclick="return myFunction();"><i class="fas fa-trash-alt me-1 text-danger"></i></a>
                                </div>
                            
                        </div>
                        
        
                        @endforeach

                    </div>
                     @foreach($jobs as $job)
                    <div class="modal fade" id="edit-job{{$job->jobId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{route('update-Job',[$job->jobId])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Job</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class="input-wrapper">
                                        <label class="control-label" for="input">Job Title</label><i class="mtrl-select"></i>
                                        <input class="form-control" type="text" id="input" name="jobTitle" value = "{{$job->jobTitle}}" placeholder="Job Title" required>
                                        
                                        </div>
                                        <div class="input-wrapper">
                                            <label class="control-label" for="input">Company Name</label><i class="mtrl-select"></i>
                                            <input class="form-control" type="text" id="input" name="companyName" value = "{{$job->companyName}}" placeholder="Company Name" required>
                                            
                                        </div>
                                        <div class="input-wrapper">
                                            <label class="control-label" for="input">Work Place Type</label><i class="mtrl-select"></i>
                                            <select name="workplaceType" class="form-control" required>
                                                <option value="">Select Work Place Type</option>
                                                <option value="remote">Remote</option>
                                                <option value="onsite">On Site</option>
                                                <option value="inhouse">In House</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper">
                                            <label class="control-label" for="textarea">Job Location</label><i class="mtrl-select"></i>
                                            <textarea class="form-control" rows="4" id="textarea" required="required" name="jobLocation" placeholder="Type Location">{{$job->jobLocation}}</textarea>    
                                        </div>
                                        <div class="input-wrapper">
                                            <label class="control-label" for="input">Job Type</label><i class="mtrl-select"></i>
                                            <select name="jobType" class="form-control" required>
                                                <option value="">Select Job Type</option>
                                                <option value="fulltime">Full Time</option>
                                                <option value="parttime">Part Time</option>
                                                <option value="hybrid">Hybrid</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper">
                                            <label class="control-label" for="textarea">Job Description</label><i class="mtrl-select"></i>
                                            <textarea class="form-control" rows="4" id="textarea" required="required" name="jobDescription" placeholder="Type Description">{{$job->jobDescription}}</textarea>    
                                        </div>
                                        <div class="submit-btns">
                                            
                                            <button type="submit" class="mtr-btn"><span>Save</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach




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

