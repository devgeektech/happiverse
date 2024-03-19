@php
use App\Models\MstUser;
use App\Models\Business;
use App\Models\Plan;
if(Auth::User()->userTypeId==2){
$reviews=Auth::User()->getBusinessDetail->rating;
}
$businessPlans=Plan::where('planType',2)->get();
$userPlans=Plan::where('planType',1)->get();
@endphp


<button class="btn btn-primary" id="headerBg">+</button>
<div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-wrapper file-uploader">
                        <label for="productImage" class="custom-label custom-label-s2 d-flex flex-column">
                            <i class="fas fa-plus fs-3 mb-2"></i>
                            Add Images
                        </label>
                        <input type="file" class="d-none" id="productImage" name="productImage[]" multiple>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" id="productName" class="form-control" placeholder="Product Name" name="productName" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="number" id="productPrice" class="form-control" placeholder="Product Price" name="productPrice" required>
                    </div>
                    <div class="input-wrapper">
                        <textarea id="" rows="5" class="form-control" placeholder="Product Description" name="productdescription" required></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="add-event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('business-event.store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="post-files"></div>
                    <div class="input-wrapper file-uploader">
                        <label for="eventImage" class="custom-label custom-label-s2 d-flex flex-column">
                            <i class="fas fa-plus fs-3 mb-2"></i>
                            Add Images
                        </label>
                        <input type="file" class="d-none" id="eventImage" name="eventImage[]" multiple>
                    </div>
                    <div class="post-files"></div>
                    <div class="input-wrapper">
                        <input type="text" id="eventName" class="form-control" placeholder="Event Name" name="eventName" required>
                    </div>
                    <div class="input-wrapper">
                        <textarea id="eventDescription" rows="5" class="form-control" placeholder="Event Description" name="eventDescription" required></textarea>
                    </div>
                    <div class="input-wrapper">
                        <input type="time" id="eventTime" class="form-control" placeholder="Time" name="eventTime" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="date" id="eventDate" class="form-control" placeholder="Select Date" name="eventDate" required >
                    </div>
                    <div class="form-check form-switch input-wrapper">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Event is physical</label>
                        <input class="form-check-input" id="eventPhysical" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                    <div class="input-wrapper event-map d-none">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38116.26726692564!2d-76.21672099204076!3d43.04096902751514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d9edddf4db1699%3A0x1b0002df2e4f210d!2sWegmans!5e0!3m2!1sen!2s!4v1672693094294!5m2!1sen!2s" width="100%" height="160" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('post.store')}}" method = "post" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="d-flex mb-3">
                        <img src="{{@$profileUrl ? @$profileUrl : ''}}" alt="" class="user-profile">
                        <div>
                            <h3 class="title">{{Auth::User()->getBusinessDetail->businessName??''}}</h3>
                            <select class="form-select" aria-label="Default select example" name= "privacy">
                                <option selected>Public</option>
                                <option value="1">Private</option>

                            </select>
                        </div>
                    </div>

                    <div class="input-wrapper custom-text-area">
                        <label id="postLabel" class="label" for="post-text"></label>
                        <textarea class="auto-height-textarea form-control" rows="1" id="post-text"
                            placeholder="Whats on your mind?" name="caption"></textarea>
                    </div>

                    <ul class="nav nav-tabs nav-tabs-s2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="text-tab" data-bs-toggle="tab"
                                data-bs-target="#text-tab-pane" type="button" role="tab"
                                aria-controls="text-tab-pane" aria-selected="true"><img
                                    src="assets/img/svg/text-bg-dark.svg" alt=""></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="media-tab" data-bs-toggle="tab"
                                data-bs-target="#media-tab-pane" type="button" role="tab"
                                aria-controls="media-tab-pane" aria-selected="false"><img
                                    src="assets/img/svg/media-dark.svg" alt=""></button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                         <div class="tab-pane fade show active" id="text-tab-pane" role="tabpanel"
                            aria-labelledby="text-tab" tabindex="0">
                            <ul class="backgrounds-list">
                                <li class="list-item">
                                    <a href="#" class="no-bg">
                                        <img src="assets/img/svg/no-bg.svg" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/img/post_backgrounds/bg1.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/img/post_backgrounds/bg2.png"  alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/img/post_backgrounds/bg3.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/img/post_backgrounds/bg4.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/img/post_backgrounds/bg5.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/img/post_backgrounds/bg6.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                         <div class="tab-pane fade" id="media-tab-pane" role="tabpanel" aria-labelledby="media-tab" tabindex="0">


                            <div class="input-wrapper file-uploader" id="postMedia">

                            <div class="img-results" id="ctePostImgResults"></div>

                             <video width="470" height="240" controls style= "display:none" id = "videodisplay" >
                                  Your browser does not support the video tag.
                                </video>
                        <div class="d-flex justify-content-between">


                        <div class="input-wrapper file-uploader">
                            <label for="ctePostFilesInput" class="custom-label">
                                <i class="far fa-image"></i>
                                Image
                            </label>
                            <input type="file" href="" class="d-none" id="ctePostFilesInput" name="image">
                        </div>
                        <div class="input-wrapper file-uploader">
                            <label for="video" class="custom-label">
                                <i class="fas fa-video"></i>
                                Video
                            </label>
                            <input type="file" href="" class="d-none" id="video" name="video">
                        </div>
                        <div class="input-wrapper file-uploader">
                            <label for="background" class="custom-label">
                                <i class="fas fa-paint-roller"></i>
                                Background
                            </label>
                            <input type="file" href="" class="d-none" id="background" name="background">
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" class="btn btn-primary w-100">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="see-rating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rating Overview</h1>
                    <button id = "modalClose" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(Auth::User()->userTypeId==2)
                    @foreach($reviews as $review)
                    @php $user=MstUser::where('userId',$review->userId)->first();
                     $business = Business::where('businessId',$review->userId)->first();
                         $userName=$user->userName??$business->businessName??"";
                    @endphp
                    <div>
                        <h3 class="title">{{$userName}}</h3>
                        <ul class="ratings">

                        @if($review->rating == 0)
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        @elseif($review->rating == 1 || $review->rating < 2)
                        <li class="list-item active"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        @elseif($review->rating == 2 || $review->rating < 3)
                        <li class="list-item active"><i class="fas fa-star"></i></li>
                        <li class="list-item active"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        @elseif($review->rating == 3 || $review->rating < 3) <li class="list-item active"><i class="fas fa-star"></i></li>
                        <li class="list-item active"><i class="fas fa-star"></i></li>
                        <li class="list-item active"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>
                        <li class="list-item"><i class="fas fa-star"></i></li>

                        @elseif($review->rating==4 || $review->rating < 4) <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item"><i class="fas fa-star"></i></li>


                        @elseif($review->rating==5 || $review->rating < 5) <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>
                            <li class="list-item active"><i class="fas fa-star"></i></li>

                        @endif
                    </ul>
                        <p>{{$review->comment}}</p>
                        <h4 class="title">{{date('d-M-Y h:i A',strtotime($review->addDate))}}</h4>
                    </div>
                    <hr>
                    @endforeach
                @endif
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-wrapper file-uploader">
                        <label for="productImage" class="custom-label custom-label-s2 d-flex flex-column">
                            <i class="fas fa-plus fs-3 mb-2"></i>
                            Add Images
                        </label>
                        <input type="file" class="d-none" id="productImage" name="productImage[]" multiple>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" id="productName" class="form-control" placeholder="Product Name" name="productName" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="number" id="productPrice" class="form-control" placeholder="Product Price" name="productPrice" required>
                    </div>
                    <div class="input-wrapper">
                        <textarea id="" rows="5" class="form-control" placeholder="Product Description" name="productdescription" required></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('update-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="productImageEdit" height="100px;" width="100px;">
                    <input type="hidden" name="productId" id="productIdEdit">
                    <div class="input-wrapper">
                        <input type="text" id="productNameEdit" class="form-control" placeholder="Product Name" name="productName" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="number" id="productPriceEdit" class="form-control" placeholder="Product Price" name="productPrice" required>
                    </div>
                    <div class="input-wrapper">
                        <textarea rows="5" class="form-control" placeholder="Product Description" name="productdescription" required id="productDescriptionEdit"></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="add-event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('business-event.store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="post-files"></div>
                    <div class="input-wrapper file-uploader">
                        <label for="eventImage" class="custom-label custom-label-s2 d-flex flex-column">
                            <i class="fas fa-plus fs-3 mb-2"></i>
                            Add Images
                        </label>
                        <input type="file" class="d-none" id="eventImage" name="eventImage[]" multiple>
                    </div>
                    <div class="post-files"></div>
                    <div class="input-wrapper">
                        <input type="text" id="eventName" class="form-control" placeholder="Event Name" name="eventName" required>
                    </div>
                    <div class="input-wrapper">
                        <textarea id="eventDescription" rows="5" class="form-control" placeholder="Event Description" name="eventDescription" required></textarea>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" id="eventTime" class="form-control" placeholder="Time" name="eventTime" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" id="eventDate" class="form-control" placeholder="Select Date" name="eventDate" required >
                    </div>
                    <div class="form-check form-switch input-wrapper">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Event is physical</label>
                        <input class="form-check-input" id="eventPhysical" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                    <div class="input-wrapper event-map d-none">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38116.26726692564!2d-76.21672099204076!3d43.04096902751514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d9edddf4db1699%3A0x1b0002df2e4f210d!2sWegmans!5e0!3m2!1sen!2s!4v1672693094294!5m2!1sen!2s" width="100%" height="160" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('business-event.update')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="post-files"></div>
                    <div class="post-files"></div>
                    <input type="hidden" id="eventIdEdit" name="eventIdEdit">
                    <img id="eventImageEdit" height="100px;" width="100px;">
                    <div class="input-wrapper">
                        <input type="text" id="eventNameEdit" class="form-control" placeholder="Event Name" name="eventName" required>
                    </div>
                    <div class="input-wrapper">
                        <textarea id="eventDescriptionEdit" rows="5" class="form-control" placeholder="Event Description" name="eventDescription" required></textarea>
                    </div>
                    <div class="input-wrapper">
                        <input type="time" id="eventTimeEdit" class="form-control" placeholder="Time" name="eventTime" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="date" id="eventDateEdit" class="form-control" placeholder="Select Date" name="eventDate" required >
                    </div>
                    <div class="form-check form-switch input-wrapper">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Event is physical</label>
                        <input class="form-check-input" id="eventPhysical" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                    <div class="input-wrapper event-map d-none">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38116.26726692564!2d-76.21672099204076!3d43.04096902751514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d9edddf4db1699%3A0x1b0002df2e4f210d!2sWegmans!5e0!3m2!1sen!2s!4v1672693094294!5m2!1sen!2s" width="100%" height="160" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="sponsoring-acc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="generate-sponsor" action="{{route('generate-sponsor')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sponsoring account to increase your sales</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="title">User account remaining</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card acc-type-card">
                                <img src="assets/img/svg/gold-acc.svg" alt="" class="card-img">
                                <div class="card-body">
                                    <h3 class="card-title">Gold Account</h3>
                                    <h3 class="status">12</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card acc-type-card">
                                <img src="assets/img/svg/platinum-acc.svg" alt="" class="card-img">
                                <div class="card-body">
                                    <h3 class="card-title">Platinum Account</h3>
                                    <h3 class="status">12</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card acc-type-card">
                                <img src="assets/img/svg/diamond-acc.svg" alt="" class="card-img">
                                <div class="card-body">
                                    <h3 class="card-title">Diamond Account</h3>
                                    <h3 class="status">12</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card acc-type-card">
                                <img src="assets/img/svg/vip-acc.svg" alt="" class="card-img">
                                <div class="card-body">
                                    <h3 class="card-title">VIP Account</h3>
                                    <h3 class="status">12</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="title hideAfter">Generate new account type</h3>

                    <div class="input-wrapper hideAfter">
                        <select class="form-select form-control sponsorplans" aria-label="Default select example" name="plan_type" required>
                            <option value="" selected>Select Account</option>
                            <option value="1">User Account</option>
                            <option value="2">Business Account</option>
                        </select>
                    </div>
                    <div class="input-wrapper individualPlans hideAfter">

                        <select class="form-select form-control individualPlanCombo" aria-label="Default select example" required name="plan_id">
                            <option value="" selected>Select User Plan</option>
                            @foreach($userPlans as $plan)
                                <option value="{{$plan->planId}}">{{$plan->planName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-wrapper businessPlans hideAfter" style="display:none">
                        <select class="form-select form-control businessPlanCombo" aria-label="Default select example" name="business_plan_id">
                            <option value="" selected>Select Business Plan</option>
                            @foreach($businessPlans as $businessPlan)
                                <option value="{{$businessPlan->planId}}">{{$businessPlan->planName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0 hideAfter">
                    <button type="submit" class="btn btn-primary w-100">Generate</button>
                </div>
                <div class="input-wrapper showAfter" style="display:none">
                    <img style="height:100px;" src="http://127.0.0.1:8000/groupdoc/qr-code.svg">
                    <p id="refferCode"></p>
                    <a style="color:black;" class="copy-text" data-clipboard-target="#refferCode" href="#">Copy Refferal Code</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
  <div class="modal fade" id="userProfileActions" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <ul class="nav nav-tabs nav-tabs-s2 border-0 mb-4" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="stealth-tab" data-bs-toggle="tab"
                                        data-bs-target="#stealth-tab-pane" type="button" role="tab"
                                        aria-controls="stealth-tab-pane" aria-selected="true"><i
                                            class="fas fa-eye-slash me-2"></i>Stealth</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="stealth-tab-pane" role="tabpanel"
                                    aria-labelledby="timeline-tab" tabindex="0">
                                    <div class="card shadow-none">
                                        <div class="card-body p-0">
                                            <h3 class="card-title mb-2">Stealth</h3>
                                            <p class="card-text mb-3">Keep you activity in stealth</p>
                                            <p class="card-text mb-2">Select Time Period for Stealth</p>
                                            <form action="">
                                                <div class="input-wrapper">
                                                    <select class="form-select form-control" aria-label="Default select example">
                                                        <option selected>Select</option>
                                                        <option value="1">15 Minutes</option>
                                                        <option value="2">30 Minutes</option>
                                                        <option value="3">1 Hour</option>
                                                        <option value="4">1 Day</option>
                                                      </select>
                                                </div>
                                                <div class="form-check form-switch input-wrapper mb-0">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label card-text" for="flexSwitchCheckChecked">Turn ON/OFF Stealth</label>
                                                  </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     <div id = "postModelContent"></div>
     <div class="modal fade language-modal" id="langModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <h3 class="card-title">Lnguage</h3>
                            <ul class="languages-list">
                                <li class="list-item" >
                                    <a href="{{ url('lang/change/ar') }}" >Arabic</a>
                                </li>
                                <li class="list-item" >
                                    <a href="{{ url('lang/change/en') }}" >English</a>
                                </li>
                                <li class="list-item ">
                                    <a href="{{ url('lang/change/zh') }}" >Chinese</a>
                                </li>
                                <li class="list-item">
                                    <a href="{{ url('lang/change/fr') }}">France</a>
                                </li>
                                <li class="list-item">
                                    <a href="{{ url('lang/change/it') }}">Italian</a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/file-uploader.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>

<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('libraries/latest-assets/js/code.js')}}"></script>
<script src="{{asset('libraries/latest-assets/js/business-post.js')}}"></script>

<!--<script src="{{asset('libraries/latest-assets/js/friendsearch.js')}}"></script>-->
<script src="{{asset('libraries/latest-assets/js/people-post.js')}}"></script>
<script src="{{asset('libraries/latest-assets/js/group-post.js')}}"></script>
<script src="{{asset('libraries/latest-assets/js/slick.min.js')}}"></script>
<script src="{{asset('libraries/latest-assets/js/main.min.js')}}"></script>
<script src="{{asset('assets/js/custom-music.js')}}"></script>
<script src="https://unpkg.com/wavesurfer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
<script src="assets/js/custom-sliders.js"></script>
<script src="assets/js/grid.js"></script>
   <script src="assets/js/custom.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $(".edit-product-data").click(function(e){
        e.preventDefault();
        $.ajax({
           url:"{{url('edit-product')}}",
           method:"GET",
           data:{"productId":$(this).attr('data-id')},
           dataType:"JSON",
           success:function(data){
               var result=eval(data);
               $('#productIdEdit').val(result.productId);
               $('#productNameEdit').val(result.productName);
               $('#productPriceEdit').val(result.productPrice);
               $('#productDescriptionEdit').html(result.productdescription);
               $('#productImageEdit').attr('src',result.productImage);
           }
        });
    });
    $(".edit-events-data").click(function(e){
        e.preventDefault();
        $.ajax({
           url:"{{url('business-event/edit')}}",
           method:"GET",
           data:{"eventId":$(this).attr('data-id')},
           dataType:"JSON",
           success:function(data){
               var result=eval(data);
               $('#eventIdEdit').val(result.eventId);
               $('#eventNameEdit').val(result.eventName);
               $('#eventTimeEdit').val(result.eventTime);
               $('#eventDescriptionEdit').html(result.eventDescription);
               $('#eventDateEdit').val(result.eventDate);
               $('#eventImageEdit').attr('src',result.eventImage);
           }
        });
    });
    APP_URL = '{{url("/searchWeb")}}';
    $('#headerSearch').on('keyup', function() {

        $value = $(this).val();
        console.log($value);
        if($value!=""){
            $.ajax({
                type: 'get',
                url: APP_URL ,
                data: {
                    'search': $value
                },
                success: function(data) {
                    var obj=eval(data);
                    if(obj[1]>0){
                        $('#businessList').hide();
                        $('#businessListNew').html(obj[3]);
                    }else{
                        $('#businessList').show();
                        $('#businessListNew').empty();
                    }
                    if(obj[0]>0){
                        $('#peopleList').hide();
                        $('#peopleListNew').html(obj[2]);

                    }else{
                        $('#peopleList').show();
                        $('#peopleListNew').empty();
                    }

                }
            });
        }else{
            $('#businessList').show();
            $('#businessListNew').empty();
            $('#peopleList').show();
            $('#peopleListNew').empty();
        }

    });
    $('.sponsorplans').change(function() {
        // alert(this.value);
        if (this.value == 1) {
            $('.individualPlans').show();
            $('.businessPlans').hide();
            // $('.individualPlanCombo').val('');
            // $('.businessPlanCombo').val('');
            $('.individualPlanCombo').attr('required',true);
            $('.businessPlanCombo').attr('required',false);
        }
        else{
            $('.individualPlans').hide();
            $('.businessPlans').show();
            // $('.businessPlanCombo').val('');
            // $('.individualPlanCombo').val('');
            $('.individualPlanCombo').attr('required',false);
            $('.businessPlanCombo').attr('required',true);
        }
    });
    $('#generate-sponsor').submit(function(e){
       e.preventDefault();
       var form_data=new FormData($(this)[0]);
       $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:form_data,
          contentType: false,
          processData: false,
          success:function(data){
              $('.hideAfter').hide();
              $('.showAfter').css('text-align','center');
              $('.showAfter').show();
              $('#refferCode').html(data);

          }
       });
    });
    $('.select_color').click(function(){
        $('#background_color').val($(this).attr('data-color'));
    });
    $('.addtoplaylist').click(function(e){
      APP_NEW_URL = '{{url("/addtoplaylist")}}';
      console.log(APP_NEW_URL);
      e.preventDefault();
      var id=$(this).attr('data-id');
      var music_href=$('.getHref'+id).attr('href');
      var music_title=$('.music_title'+id).html();
      var music_id=$('.musicId'+id).val();
      var music_image=$('.dynamicCover'+id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
         'url':APP_NEW_URL,
         'type':'POST',
         'data':{"music_href":music_href,"music_title":music_title,"music_id":music_id,"music_image":music_image},
         success:function(data){
             if(data=="1"){
                 alert("Music added to playlist!");
                 window.location.href="/hapiverse/public/musics";
             }else{
                 alert(data);
             }
         },
      });
    })


     APP_URL_LIKE = '{{url("/like")}}';

    setTimeout(function(){
        $(".heart").on("click",function() {
            console.log("ok");
            // var postId = document.getElementsByClassName("heart").value;
            // alert(postId);
            var btnValue = $(this).attr('value');
            var $this = $(this);



            $.ajax({
                type: "GET",
                url: APP_URL_LIKE + '/' + btnValue,
                check : "#counts"+btnValue,

                success: function(result) {
                    // alert(result.status);

                    if (result.status == 'Success') {
                        $this.addClass('active');
                        // alert('success');
                    }
                    else {
                        $this.removeClass('active');
                        //alert('blank');
                    }
                    console.log(result);
                    console.log("#counts"+btnValue);
                    console.log("#check"+btnValue);


                    $("#counts" + btnValue).html(result["postlikes"]);
                    $("#counts" + btnValue + "model").html(result["postlikes"]);
                    $("#check" + btnValue).html(result["image"]);
                    $("#check" + btnValue + "model").html(result["image"]);
                },
                error: function(result) {
                    console.log(result);

                }
            });
        });
}, 5000)
</script>
<script>
    $(document).ready(function(){

    $(document).on('click', '#commentDisplay', function(e){


        e.preventDefault();

        var url = $(this).data('url');

        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);
            $('#dynamic-content').html('');
            $('#dynamic-content').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

});

   $(document).ready(function(){

    $(document).on('click', '#postModel', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#postModelContent').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);
            $('#postModelContent').html('');
            $('#postModelContent').html(data); // load response
            $('#modal-loader').hide();        // hide ajax loader
        })
        .fail(function(){
            $('#postModelContent').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

});
</script>
<script>

            var d1 = document.getElementById('postLabel');
            d1.insertAdjacentHTML('afterend', '<input id= "backgroundImage" type = "hidden" id = "background_image" name = "background_image" >');

            setInterval(function(){

            let element = document.querySelector('#postLabel');


            let style = getComputedStyle(element);
            let backgroundImage = style.backgroundImage;
            if(backgroundImage  != 'none'){
            let myArray2 = backgroundImage.split("url(\"");
            let myArray3= myArray2[1];
            let myArray4= myArray3.split("\")");
            let myArray5= myArray4[0].split("http://127.0.0.1:8000/");

            document.getElementById('backgroundImage').value = myArray5[0];

            }

            }, 3000);

            $(function () {
                $('#modalClose').on('click', function () {
                    // $('#see-rating').hide();
                    $('#see-rating').css("display","none");
                })
            })

</script>
</body>

</html>
