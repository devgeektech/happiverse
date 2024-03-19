@php
use App\Models\Business;
$userDetail=\Auth::user() ?? "";
if(Auth::User()->userTypeId==1){
    $profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";
}else{
    $profileImage=$userDetail->getBusinessDetail->logoImageUrl ?? "";
}

$profileUrl='http://127.0.0.1:8000/'.$profileImage;
@endphp
<div class="story-slider-wrapper card">
    <div class="card-body">
        <div class="story-slider">
            <div class="story-uploader">
                <a data-bs-toggle="modal" href="#create-stroy" role="button"><img src="{{$profileUrl}}" alt=""></a>
            </div>
            @foreach($stories as $story)
            @php
            if($story->first()->isBusiness == 1){
                $user=Business::where('businessId',$story->first()->userId??"")->first();
                $userId = $user->businessId;
                $url = $user->logoImageUrl;
            }else{
                $url = $story->first()->user->profileImageUrl ?? '';
                $userId= $story->first()->user->userId??'';
            }

            @endphp
            <div>
                <a href="{{route('story-detail',$userId ?? '')}}" class="slider-item active">
                    <img src="{{'http://127.0.0.1:8000/'.$url ?? ''}}" alt="">
                </a>
                <p class="time">{{\Carbon\Carbon::parse($story->first()->posted_date)->diffForhumans()}}</p>
            </div>
            @endforeach
        </div>

        <div class="modal fade" id="create-stroy" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a data-bs-toggle="modal" href="#create-image-story">
                                    <div class="card create-post gradient-2 mb-2 mb-lg-0">
                                        <div class="card-body">
                                            <div
                                                class="d-flex flex-column align-items-center justify-content-center py-4 py-lg-5 w-100">
                                                <img src="assets/img/svg/media.svg" alt="" class="card-img">
                                                <h3 class="card-title">Create Photo Story</h3>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a data-bs-toggle="modal" href="#create-text-story">
                                    <div class="card create-post gradient-1">
                                        <div class="card-body">
                                            <div
                                                class="d-flex flex-column align-items-center justify-content-center py-4 py-lg-5 w-100">
                                                <img src="assets/img/svg/text-bg.svg" alt="" class="card-img">
                                                <h3 class="card-title">Create Text Story</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="create-text-story" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <form action="{{route('create-story')}}" method="POST">
                            @csrf
                            <input type="hidden" name="text_back_ground" id="background_color" value="red">
                            <input type="hidden" name="content_type" value="story">
                            <input type="hidden" name="postType" value="text">
                            <div class="d-flex align-items-center mb-3">
                                <a class="icon" href="#"><i class="fas fa-smile"></i></a>
                                <ul class="bg-colors-list ms-3">
                                    <li class="list-item ">

                                        <a href="#" class="bg-color red select_color" data-color="red"></a>
                                    </li>
                                    <li class="list-item ">
                                        <a href="#" class="bg-color blue select_color" data-color="blue"></a>
                                    </li>
                                    <li class="list-item ">
                                        <a href="#" class="bg-color green select_color" data-color="green"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="custom-text-area text-with-bg">
                                <label id="storyLabel" class="label" for="story-text"></label>
                                <textarea rows="1" id="story-text" placeholder="Type a Status" name="caption"></textarea>
                            </div>
                            <div class="modal-footer pt-0 border-0">
                                <button id="createStorySubmit" type="submit"
                                    class="btn btn-primary w-100">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="create-image-story" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{route('create-story')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="content_type" value="story">
                        <input type="hidden" name="postType" value="image">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class=" d-flex gap-2 input-wrapper">
                                <button type="button" class="reset-input-btn btn d-none"><i
                                        class="far fa-trash-alt"></i></button>
                                <label for="cteStoryImgInput" class="custom-label custom-label-s2 d-flex flex-column">
                                    <i class="fas fa-plus"></i>
                                    <span>Drag & Drop your files or Browse</span>
                                </label>
                            </div>
                            <input class="d-none" type="file" id="cteStoryImgInput" name="story_image">
                            <div class="custom-text-area text-with-bg d-none">
                                <div class="img-results" id="cteStoryImgResults"></div>
                                <textarea rows="1" id="storyImg-text" placeholder="Type a Status" name="caption"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer pt-0 border-0">
                            <button id="createStorySubmit" type="submit"
                                class="btn btn-primary w-100">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
