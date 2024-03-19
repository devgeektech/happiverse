<div class="message-wrapper">
    <!-- <a href="#" class="compose-message"><i class="far fa-edit"></i></a> -->
    <div id="chatSingleBox" class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        class="d-flex align-items-center gap-2">
                        <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                        <div>
                            <h3 class="user-name">Mike Ibrahim</h3>
                            <p class="lead">Active 1 h ago</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">View Profile</a></li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                        <li><a class="dropdown-item" href="#">Mute Notifications</a></li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="" class="icon"><i class="fas fa-phone-alt"></i></a>
                    <a href="" class="icon"><i class="fas fa-video"></i></a>
                    <form action = "{{url('/agora/call-user')}}" method = "post">
                        @csrf
                        <button type = "submit" class="icon"><i class="fas fa-video"></i></button>
                        
                    </form>
                    <a id="closeChatSingleBox" href="javascript:void(0)" class="icon"><i class="fas fa-times"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="message-content-wrapper">
                <div class="message-item sent">
                    <div class="message">
                        <div class="d-flex gap-2">
                            <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                            <div class="text-wrapper">
                                <p class="comment-text">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Modi, quasi?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item reply">
                    <div class="message">
                        <div class="text-wrapper">
                            <p class="comment-text">consectetur adipisicing elit. Modi, quasi?</p>
                        </div>
                    </div>
                </div>
                <div class="message-item sent">
                    <div class="message">
                        <div class="d-flex gap-2">
                            <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                            <div class="text-wrapper">
                                <p class="comment-text">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Modi, quasi?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item reply">
                    <div class="message">
                        <div class="text-wrapper">
                            <p class="comment-text">consectetur adipisicing elit. Modi, quasi?</p>
                        </div>
                    </div>
                </div>
                <div class="message-item sent">
                    <div class="message">
                        <div class="d-flex gap-2">
                            <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                            <div class="text-wrapper">
                                <p class="comment-text">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Modi, quasi?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item reply">
                    <div class="message">
                        <div class="text-wrapper">
                            <p class="comment-text">consectetur adipisicing elit. Modi, quasi?</p>
                        </div>
                    </div>
                </div>
                <div class="message-item sent">
                    <div class="message">
                        <div class="d-flex gap-2">
                            <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                            <div class="text-wrapper">
                                <p class="comment-text">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Modi, quasi?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item reply">
                    <div class="message">
                        <div class="text-wrapper">
                            <p class="comment-text">consectetur adipisicing elit. Modi, quasi?</p>
                        </div>
                    </div>
                </div>
                <div class="message-item sent">
                    <div class="message">
                        <div class="d-flex gap-2">
                            <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                            <div class="text-wrapper">
                                <p class="comment-text">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Modi, quasi?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item reply">
                    <div class="message">
                        <div class="text-wrapper">
                            <p class="comment-text">consectetur adipisicing elit. Modi, quasi?</p>
                        </div>
                    </div>
                </div>
                <div class="message-item sent">
                    <div class="message">
                        <div class="d-flex gap-2">
                            <img src="assets/img/png/profile-1.png" alt="" class="user-img">
                            <div class="text-wrapper">
                                <p class="comment-text">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Modi, quasi?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-item reply">
                    <div class="message">
                        <div class="text-wrapper">
                            <p class="comment-text">consectetur adipisicing elit. Modi, quasi?</p>
                        </div>
                    </div>
                </div>
            </div>
            <form action = "" method = "post">
            <div class="d-flex align-items-end gap-2 p-2">
                <a href="" class="message-control"><i class="fas fa-paperclip"></i></a>
                <a href="" class="message-control"><i class="fas fa-smile"></i></a>
                <textarea type="text" rows="1" class="form-control auto-height-textarea" placeholder="Type your message here"></textarea>
                 
                <button type = "submit" class="message-control">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <g id="share.light" transform="translate(-0.013)">
                <path id="Path_150" data-name="Path 150" d="M17.034.407A1.016,1.016,0,0,0,16.181,0a1.717,1.717,0,0,0-.541.1L1,4.975a1.364,1.364,0,0,0-.956.945A1.364,1.364,0,0,0,.476,7.193.5.5,0,0,0,.6,7.285l6.164,3.177,3.177,6.164a.5.5,0,0,0,.092.126,1.433,1.433,0,0,0,1.01.463h0a1.307,1.307,0,0,0,1.208-.987l4.88-14.64a1.289,1.289,0,0,0-.1-1.181ZM1.025,6.152c.019-.082.132-.166.294-.22L15.215,1.3,7.044,9.471l-5.9-3.042a.362.362,0,0,1-.116-.277ZM11.3,15.909c-.048.144-.139.3-.251.3a.424.424,0,0,1-.246-.12l-3.042-5.9,8.171-8.171Z" transform="translate(0)" fill="#1c2233"></path>
            </g>
        </svg>
                </button>
               
            </div>
            </form>
        </div>
    </div>
</div>