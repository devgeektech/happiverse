<div class="topbar stick" style="background-color: #0E0A75; position:fixed; width:100%">
    <div class="logo">
        <a title="" href="{{route('dashboard')}}"><img src="{{asset('libraries/latest-assets/images/happivers-logo.svg')}}" alt="" height="50" width="80"></a>
    </div>

    <ul class="main-menu">
        <li>
            <a class="active" href="{{route('dashboard')}}" title=""><img src="{{asset('libraries/images/svg/home-ico.svg')}}" alt=""></a>

        </li>
        <li>
            <a href="#" title=""><img src="{{asset('libraries/images/svg/post-ico.svg')}}" alt=""></a>

        </li>
        <li>
            <a href="{{route('photos')}}" title=""><img src="{{asset('libraries/images/svg/gallery-ico.svg')}}" alt=""></a>

        </li>
        <li>
            <a href="#" title=""><img src="{{asset('libraries/images/svg/videos-ico.svg')}}" alt=""></a>

        </li>
    </ul>
    <div class="user-controls">
        <ul class="setting-area">
            <li class="position-relative">
                <a id="header-search" href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
                <div class="searched">
                    <div class="search-wrapper">
                        <div class="card border-radius-10">
                            <div class="card-header">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="people-tab" data-bs-toggle="tab" data-bs-target="#people" type="button" role="tab" aria-controls="people" aria-selected="true">Peoples</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#business" type="button" role="tab" aria-controls="business" aria-selected="false">Business</button>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active border-0" id="people" role="tabpanel" aria-labelledby="people-tab">
                                        <form method="post" action="{{route('search-people')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="searchPeople" id="searchPeople">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <div id="peopleList">

                                            <table class="table table-striped table-bordered">
                                                <span id="total_records"></span>
                                                <tbody>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade border p-3" id="business" role="tabpanel" aria-labelledby="business-tab">

                                        <form method="post" action="{{route('search-business.list')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="searchBusiness" id="searchBusiness">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <div id="businessList">
                                            <table class="table table-striped table-bordered">

                                                <tbody>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <form method="post" class="form-search">
                            <input type="text" placeholder="Search Friend">
                            <button data-ripple><i class="ti-search"></i></button>
                        </form> -->

                    </div>
                </div>
            </li>
            <li><a href="newsfeed.html" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
            <li>
                <a href="#" title="Notification" data-ripple="">
                    <i class="ti-bell"></i><span>20</span>
                </a>
                <div class="dropdowns">
                    <span>4 New Notifications</span>
                    <ul class="drops-menu">
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-1.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>sarah Loren</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag green">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-2.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Jhon doe</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag red">Reply</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-3.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Andrew</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag blue">Unseen</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-4.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Tom cruse</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-5.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Amy</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                    </ul>
                    <a href="notifications.html" title="" class="more-mesg">view more</a>
                </div>
            </li>
            <li>
                <a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
                <div class="dropdowns">
                    <span>5 New Messages</span>
                    <ul class="drops-menu">
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-1.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>sarah Loren</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag green">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-2.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Jhon doe</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag red">Reply</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-3.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Andrew</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag blue">Unseen</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-4.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Tom cruse</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="images/resources/thumb-5.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Amy</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                    </ul>
                    <a href="messages.html" title="" class="more-mesg">view more</a>
                </div>
            </li>
            <li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
                <div class="dropdowns languages">
                    <a href="#" title=""><i class="ti-check"></i>English</a>
                    <a href="#" title="">Arabic</a>
                    <a href="#" title="">Dutch</a>
                    <a href="#" title="">French</a>
                </div>
            </li>
        </ul>
        <div class="user-img">
            <img src="{{asset('libraries/latest-assets/images/resources/admin.jpg')}}" alt="">
            <span class="status f-online"></span>
            <div class="user-setting">
            </div>
        </div>
    </div>
    <!-- <div class="top-area">
    </div> -->
</div><!-- topbar -->