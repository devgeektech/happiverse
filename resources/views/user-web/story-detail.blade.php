@include('user-web.layouts.head')

<body>
    <div class="main">
        <div class="main-content">
            <div class="story-content-wrapper">
                <div class="story-sidebar">
                    <div class="sidebar-header d-flex align-items-center">
                        <a href="{{route('dashboard')}}" class="btn">X</a>
                        <a href="" class="logo"><img src="assets/img/svg/happiverse-logo.svg" alt=""></a>
                    </div>
                    <div class="main-wrapper">
                        <h3 class="main-title">
                            Stories
                        </h3>
                        <ul class="story-side-menu">
                            @foreach($userStories as $user)

                            <li class="list-item active">
                                <a class="active" href="">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="user-img">
                                            <img src="{{asset($user->user->profileImageUrl )}}" alt="">
                                        </div>
                                        <div>
                                            <h3 class="title">{{$user->user->userName}}</h3>
                                            <p class="lead">10h ago</p>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
                <div class="story-content-wrapper">
                    <div class="story-content">
                        <div class="controls d-none">
                            <ul>
                                <li class="list-item">
                                    <a class="active" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 19.673 17.215">
                                            <g id="heart-light" transform="translate(0.001 -2)">
                                                <path stroke="#1c2233" id="heartPath" data-name="Path 146" d="M9.4,19.031a.614.614,0,0,0,.875,0l7.865-7.969A5.328,5.328,0,0,0,14.424,2c-2.8,0-4.086,2.058-4.587,2.443C9.334,4.057,8.056,2,5.25,2a5.326,5.326,0,0,0-3.714,9.062Z" transform="translate(0 0)" fill="transparent" />
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="30" height="30" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path d="M30,1.5c-16.542,0-30,12.112-30,27c0,5.204,1.646,10.245,4.768,14.604c-0.591,6.537-2.175,11.39-4.475,13.689
                                                c-0.304,0.304-0.38,0.769-0.188,1.153C0.275,58.289,0.625,58.5,1,58.5c0.046,0,0.092-0.003,0.139-0.01
                                                c0.405-0.057,9.813-1.411,16.618-5.339C21.621,54.71,25.737,55.5,30,55.5c16.542,0,30-12.112,30-27S46.542,1.5,30,1.5z M16,32.5
                                                c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S18.206,32.5,16,32.5z M30,32.5c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4
                                                S32.206,32.5,30,32.5z M44,32.5c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S46.206,32.5,44,32.5z" fill="#1c2233" data-original="#1c2233" class=""></path>
                                                <g>
                                                </g>
                                        </svg>
                                    </a>
                                </li>
                                <li class="list-item">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <g>
                                                    <path d="m271.176 121.396c-150.205 7.822-271 132.495-271 284.604v106l37.925-88.29c44.854-89.692 133.847-147.041 233.075-152.314v121.318l240.648-196.714-240.648-196z" fill="#1c2233" data-original="#1c2233" class=""></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @foreach ($stories as $story)
                        <img src="{{asset($story->postFileUrl)}}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('user-web.layouts.footer')
