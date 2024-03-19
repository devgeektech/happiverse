@php
use App\Models\MstUser;
use App\Models\Chats;
$chats = Chats::all();
$userDetail=\Auth::user() ?? "";
$profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";
$profileUrl='http://127.0.0.1:8000/'.$profileImage;

if(Auth::User()->userTypeId==2){
$reviews=$userDetail->getBusinessDetail->rating;
}
@endphp

<div class="modal fade" id="facialDetectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" href="#" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body text-center">
                <h1 class="card-title fs-1">Face Detection</h1>
                <form method="POST" action="{{url('/image-search')}}" enctype="multipart/form-data">
                    @csrf

                     <div class="input-wrapper file-uploader">
                        <label for="image" class="custom-label custom-label-sm">
                            <i class="far fa-image"></i>
                            Image
                        </label>
                        <input type="file" name="image" id="image" accept="image/*" class = "d-none">
                        <img src="" id="image-preview" alt="Image Preview" style="max-width: 200px; display: none;">

                    </div>
                      <button type="submit" class = "btn btn-primary">Search</button>
                </form>

            </div>
            <div class="modal-footer">
                <a class="btn btn-primary w-100" href="#" data-dismiss="modal">OK</a>
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
            <form action="{{route('post.store')}}" class ="upload-form" method = "post" enctype="multipart/form-data">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="d-flex mb-3">
                        <img src="{{$profileUrl}}" alt="" class="user-profile">
                        <div>
                            <h3 class="title">{{Auth::User()->getUserDetail->userName}}</h3>
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
                                        <img src="assets/post_backgrounds/bg1.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/post_backgrounds/bg2.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/post_backgrounds/bg3.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/post_backgrounds/bg4.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/post_backgrounds/bg5.png" alt="">
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="background-img">
                                        <img src="assets/post_backgrounds/bg6.png" alt="">
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
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar"
                                  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    0%
                                  </div>
                                </div>

                        <div class="d-flex justify-content-between">


                        <div class="input-wrapper file-uploader">
                            <label for="ctePostFilesInput" class="custom-label">
                                <i class="far fa-image"></i>
                                {{__('msg.image')}}
                            </label>
                            <input type="file" href="" class="d-none" id="ctePostFilesInput" name="image" multiple>
                        </div>
                        <div class="input-wrapper file-uploader">
                            <label for="video" class="custom-label">
                                <i class="fas fa-video"></i>
                                {{__('msg.video')}}
                            </label>
                            <input type="file" href="" class="d-none" id="video" name="video" onchange="uploadFile()">
                        </div>
                        <div class="input-wrapper file-uploader">
                            <label for="background" class="custom-label">
                                <i class="fas fa-paint-roller"></i>
                                {{__('msg.background')}}
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if(Auth::User()->userTypeId==2)
                    @foreach($reviews as $review)
                    @php $user=MstUser::where('userId',$review->userId)->first();
                         $userName=$user->userName;
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
                                    <p class="card-text mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ipsum voluptatum sint quo ipsa fuga itaque modi cum iure aspernatur.</p>
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

 <div class="modal fade" id="friendProfileActions" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-tabs-s2 border-0 mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ghost-tab" data-bs-toggle="tab"
                                data-bs-target="#ghost-tab-pane" type="button" role="tab"
                                aria-controls="ghost-tab-pane" aria-selected="true"><i
                                    class="fas fa-ghost me-2"></i>Ghost Mode</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="ghost-tab-pane" role="tabpanel"
                            aria-labelledby="photos-tab" tabindex="0">
                            <div class="card shadow-none">
                                <div class="card-body p-0">
                                    <h3 class="card-title mb-2">Ghost (Blocking)</h3>
                                    <p class="card-text mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ipsum voluptatum sint quo ipsa fuga itaque modi cum iure aspernatur.</p>
                                    <p class="card-text mb-2">Select Time Period for Ghost</p>
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
                                            <label class="form-check-label card-text" for="flexSwitchCheckChecked">Turn ON/OFF Ghost</label>
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
                    <h3 class="card-title">Languages</h3>
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
                        <li class="list-item">
                            <a href="{{ url('lang/change/ru') }}">Russian </a>
                        </li>
                        <li class="list-item">
                            <a href="{{ url('lang/change/tt') }}">Tagalog </a>
                        </li>
                        <li class="list-item">
                            <a href="{{ url('lang/change/es') }}">Spanish </a>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade language-modal" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Location Privay</h1>
                    <h3 class="card-title">Always</h3>
                    <p>we receive this device's precise location even when you are not using hapiverse</p>
                    <div class="form-check form-switch input-wrapper">
                                <label class="form-check-label" for="alwayslocation">Turn On Location </label>
                                <input class="form-check-input" id="alwayslocation" type="checkbox" role="switch">
                            </div>
                    <h3 class="card-title">While Using</h3>
                    <p>we receive this device's precise location only when you use hapiverse</p>
                    <div class="form-check form-switch input-wrapper">
                                <label class="form-check-label" for="whileUsing">Turn On Location </label>
                                <input class="form-check-input" id="whileUsing" type="checkbox" role="switch">
                            </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tagUsers" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <ul class="friends-list">
                    <li class="list-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="d-flex align-items-center gap-2" href="">
                                <img class="user-img" src="assets/img/png/profile-1.png">
                                <div>
                                    <h3 class="title">Sam Witwicy</h3>
                                    <p class="lead">1 mutual friend</p>
                                </div>
                            </a>
                            <a href="" class="btn btn-primary btn-small">Add Friend</a>
                        </div>
                    </li>
                    <li class="list-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="d-flex align-items-center gap-2" href="">
                                <img class="user-img" src="assets/img/png/profile-1.png">
                                <div>
                                    <h3 class="title">Sam Witwicy</h3>
                                    <p class="lead">1 mutual friend</p>
                                </div>
                            </a>
                            <a href="" class="btn btn-primary btn-small">Add Friend</a>
                        </div>
                    </li>
                    <li class="list-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="d-flex align-items-center gap-2" href="">
                                <img class="user-img" src="assets/img/png/profile-1.png">
                                <div>
                                    <h3 class="title">Sam Witwicy</h3>
                                    <p class="lead">1 mutual friend</p>
                                </div>
                            </a>
                            <a href="" class="btn btn-primary btn-small">Add Friend</a>
                        </div>
                    </li>
                    <li class="list-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="d-flex align-items-center gap-2" href="">
                                <img class="user-img" src="assets/img/png/profile-1.png">
                                <div>
                                    <h3 class="title">Sam Witwicy</h3>
                                    <p class="lead">1 mutual friend</p>
                                </div>
                            </a>
                            <a href="" class="btn btn-primary btn-small">Add Friend</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>







<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/aksFileUpload.min.js')}}"></script>
<!--<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
<script src="{{asset('assets/js/custom-sliders.js')}}"></script>



<script src="{{asset('libraries/vendors/js/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKQyuecIyHYCUzIDVtpKY6I9x100fa890&callback=initAutocomplete&libraries=places" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>
<script src="{{asset('assets/js/footer.js')}}"></script>
  <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script>
<script>
function placeCall(id, calleeName){
    alert("check");
}
export default {
  name: "AgoraChat",
  props: ["authuser", "authuserid", "allusers", "agora_id"],
  data() {
    return {
      callPlaced: false,
      client: null,
      localStream: null,
      mutedAudio: false,
      mutedVideo: false,
      userOnlineChannel: null,
      onlineUsers: [],
      incomingCall: false,
      incomingCaller: "",
      agoraChannel: null,
    };
  },
  mounted() {
    this.initUserOnlineChannel();
    this.initUserOnlineListeners();
  },
  methods: {
    /**
     * Presence Broadcast Channel Listeners and Methods
     * Provided by Laravel.
     * Websockets with Pusher
     */
    initUserOnlineChannel() {
      this.userOnlineChannel = window.Echo.join("agora-online-channel");
    },
    initUserOnlineListeners() {
      this.userOnlineChannel.here((users) => {
        this.onlineUsers = users;
      });
      this.userOnlineChannel.joining((user) => {
        // check user availability
        const joiningUserIndex = this.onlineUsers.findIndex(
          (data) => data.id === user.id
        );
        if (joiningUserIndex < 0) {
          this.onlineUsers.push(user);
        }
      });
      this.userOnlineChannel.leaving((user) => {
        const leavingUserIndex = this.onlineUsers.findIndex(
          (data) => data.id === user.id
        );
        this.onlineUsers.splice(leavingUserIndex, 1);
      });
      // listen to incomming call
      this.userOnlineChannel.listen("MakeAgoraCall", ({ data }) => {
        if (parseInt(data.userToCall) === parseInt(this.authuserid)) {
          const callerIndex = this.onlineUsers.findIndex(
            (user) => user.id === data.from
          );
          this.incomingCaller = this.onlineUsers[callerIndex]["name"];
          this.incomingCall = true;
          // the channel that was sent over to the user being called is what
          // the receiver will use to join the call when accepting the call.
          this.agoraChannel = data.channelName;
        }
      });
    },
    getUserOnlineStatus(id) {
      const onlineUserIndex = this.onlineUsers.findIndex(
        (data) => data.id === id
      );
      if (onlineUserIndex < 0) {
        return "Offline";
      }
      return "Online";
    },
    async placeCall(id, calleeName) {
      try {
        // channelName = the caller's and the callee's id. you can use anything. tho.
        const channelName = `${this.authuser}_${calleeName}`;
        const tokenRes = await this.generateToken(channelName);
        // Broadcasts a call event to the callee and also gets back the token
        await axios.post("/agora/call-user", {
          user_to_call: id,
          username: this.authuser,
          channel_name: channelName,
        });
        this.initializeAgora();
        this.joinRoom(tokenRes.data, channelName);
      } catch (error) {
        console.log(error);
      }
    },
    async acceptCall() {
      this.initializeAgora();
      const tokenRes = await this.generateToken(this.agoraChannel);
      this.joinRoom(tokenRes.data, this.agoraChannel);
      this.incomingCall = false;
      this.callPlaced = true;
    },
    declineCall() {
      // You can send a request to the caller to
      // alert them of rejected call
      this.incomingCall = false;
    },
    generateToken(channelName) {
      return axios.post("hapiverse/public/agora/token", {
        channelName,
      });
    },
    /**
     * Agora Events and Listeners
     */
    initializeAgora() {
      this.client = AgoraRTC.createClient({ mode: "rtc", codec: "h264" });
      this.client.init(
        this.agora_id,
        () => {
          console.log("AgoraRTC client initialized");
        },
        (err) => {
          console.log("AgoraRTC client init failed", err);
        }
      );
    },
    async joinRoom(token, channel) {
      this.client.join(
        token,
        channel,
        this.authuser,
        (uid) => {
          console.log("User " + uid + " join channel successfully");
          this.callPlaced = true;
          this.createLocalStream();
          this.initializedAgoraListeners();
        },
        (err) => {
          console.log("Join channel failed", err);
        }
      );
    },
    initializedAgoraListeners() {
      //   Register event listeners
      this.client.on("stream-published", function (evt) {
        console.log("Publish local stream successfully");
        console.log(evt);
      });
      //subscribe remote stream
      this.client.on("stream-added", ({ stream }) => {
        console.log("New stream added: " + stream.getId());
        this.client.subscribe(stream, function (err) {
          console.log("Subscribe stream failed", err);
        });
      });
      this.client.on("stream-subscribed", (evt) => {
        // Attach remote stream to the remote-video div
        evt.stream.play("remote-video");
        this.client.publish(evt.stream);
      });
      this.client.on("stream-removed", ({ stream }) => {
        console.log(String(stream.getId()));
        stream.close();
      });
      this.client.on("peer-online", (evt) => {
        console.log("peer-online", evt.uid);
      });
      this.client.on("peer-leave", (evt) => {
        var uid = evt.uid;
        var reason = evt.reason;
        console.log("remote user left ", uid, "reason: ", reason);
      });
      this.client.on("stream-unpublished", (evt) => {
        console.log(evt);
      });
    },
    createLocalStream() {
      this.localStream = AgoraRTC.createStream({
        audio: true,
        video: true,
      });
      // Initialize the local stream
      this.localStream.init(
        () => {
          // Play the local stream
          this.localStream.play("local-video");
          // Publish the local stream
          this.client.publish(this.localStream, (err) => {
            console.log("publish local stream", err);
          });
        },
        (err) => {
          console.log(err);
        }
      );
    },
    endCall() {
      this.localStream.close();
      this.client.leave(
        () => {
          console.log("Leave channel successfully");
          this.callPlaced = false;
        },
        (err) => {
          console.log("Leave channel failed");
        }
      );
    },
    handleAudioToggle() {
      if (this.mutedAudio) {
        this.localStream.unmuteAudio();
        this.mutedAudio = false;
      } else {
        this.localStream.muteAudio();
        this.mutedAudio = true;
      }
    },
    handleVideoToggle() {
      if (this.mutedVideo) {
        this.localStream.unmuteVideo();
        this.mutedVideo = false;
      } else {
        this.localStream.muteVideo();
        this.mutedVideo = true;
      }
    },
  },
};


</script>

@include('Chatify::layouts.footerLinks')


