@include('web.layouts.head')
@include('web.layouts.header')
@include('web.layouts.navbar')

@php
$userDetail=\Auth::user() ?? "";
$profileImage=$userDetail->getUserDetail->profileImageUrl ?? "";
@endphp
<section class="custom-section">
    @include('home.short-cuts')
    <div class="container-fluid">
        <div class="row" id="page-contents">
            <div class="col-xxl-4 col-lg-6 col-md-8 offset-xxl-4 offset-lg-3 offset-md-2">
                <div class="story-slider-wrapper">
                    <div class="story-slider">
                        <a href="" class="slider-item active">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="">
                        </a>
                        <a href="" class="slider-item active">
                            <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=686&q=80" alt="">
                        </a>
                        <a href="" class="slider-item active">
                            <img src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1453&q=80" alt="">
                        </a>
                        <a href="" class="slider-item active">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                        </a>
                        <a href="" class="slider-item active">
                            <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=689&q=80" alt="">
                        </a>
                        <a href="" class="slider-item active">
                            <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=723&q=80" alt="">
                        </a>
                    </div>
                </div>
                <div class="card create-post-wrapper">
                    <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                <img src="{{asset('userdoc/'.$profileImage)}}" class="profil-pic">
                                <input type="text" class="form-control" placeholder="Write Something..." name="caption">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="custom-uploaders">

                                <div class="input-wrapper file-uploader">
                                    <label for="image" class="custom-label">
                                        <i class="far fa-image"></i>
                                        Image
                                    </label>
                                    <input type="file" class="d-none" id="image" name="image">
                                </div>
                                <div class="input-wrapper file-uploader">
                                    <label for="video" class="custom-label">
                                        <i class="fas fa-video"></i>
                                        Video
                                    </label>
                                    <input type="file" class="d-none" id="video" name="video">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                    </form>
                </div>
                <div id="posts">
                    <!-- Results -->
                </div>


                <div class="loadMore">

                </div>

            </div><!-- centerl meta -->

        </div>
    </div>
</section>

@include('web.layouts.footer')