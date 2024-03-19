@php
$userDetail=\Auth::user() ?? "";
$profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";
$profileUrl='http://127.0.0.1:8000/'.$profileImage;
@endphp
<div class="story-slider-wrapper card">
    <div class="card-body">
        <div class="story-slider">
            <div class="story-uploader">
                <!-- <label for="storyUploader" class="form-label"><img src="assets/img/png/profile-1.png" alt=""></label>
                <input id="storyUploader" type="file" class="d-none"> -->
                <a data-bs-toggle="modal" href="#create-stroy" role="button"><img src="{{$profileUrl}}" alt=""></a>
            </div>
            @foreach($stories as $story)
            @php
            $storyImage=$story->postImage[0]->postFileUrl ?? "";
            @endphp
            <div>
                <a href="{{route('story-detail',$story->postId)}}" class="slider-item active">
                    <img src="{{asset( $storyImage)}}" alt="">
                </a>
                <p class="time">1 Hour ago</p>
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
                                <a href="#">
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
                        <form action="">
                            <div class="d-flex align-items-center mb-3">
                                <a class="icon" href="#"><i class="fas fa-smile"></i></a>
                                <ul class="bg-colors-list ms-3">
                                    <li class="list-item">
                                        <a href="#" class="bg-color red"></a>
                                    </li>
                                    <li class="list-item">
                                        <a href="#" class="bg-color blue"></a>
                                    </li>
                                    <li class="list-item">
                                        <a href="#" class="bg-color green"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="custom-text-area">
                                <label id="storyLabel" class="label" for="story-text"></label>
                                <textarea rows="1" id="story-text" placeholder="Type a Status"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer pt-0 border-0">
                        <button disabled id="createStorySubmit" type="submit"
                            class="btn btn-primary w-100">Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
