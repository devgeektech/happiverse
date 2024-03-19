@include('user-web.layouts.head')

@include('user-web.layouts.header')



<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">

                @include('user-web.layouts.sidebar')

                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-body">

                            <h3 class="card-title">Photos</h3>
                           
                            <div class="row photos-gallery">
                                @foreach($postFile as $img)
                                
                                <div class="col-lg-4">
                                    <a id="postModel"   data-bs-toggle="modal" data-bs-target="#post{{$img->postId??''}}" data-url="{{ route('postModal',['id'=>$img->postId??'0'])}}"> 
                                        <div class="img-wrapper">
                                            @php
                                            
                                        
                                            if(!empty($img->postFileUrl)){
                                            $url='http://127.0.0.1:8000/'.$img->postFileUrl;
                                            $extention=pathinfo($img->postFileUrl, PATHINFO_EXTENSION);
                                            }
                                            else{
                                            $extention = "";
                                            }
                                            
                                            @endphp
                                            @if($extention=="png" || $extention=="jpg"|| $extention=="jpeg" )
                                            <img src="{{$url}}" alt="">
                                            @endif
                                        </div>

                                    </a>

                                </div>


                                @endforeach



                            </div>

                        </div>

                    </div>





                </div>



            </div>

        </div>

    </section>

</div>



@include('user-web.layouts.footer')