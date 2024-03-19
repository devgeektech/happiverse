@php

$user=Auth::user() ?? "";

$userDetail=$user->getUserDetail??"";

@endphp

@if(Auth::user()->userTypeId==1)
    @include('user-web.layouts.head')
    @include('user-web.layouts.header')
@else
    @include('business.layouts.head')
    @include('business.layouts.header')
@endif


<div class="main-content">

    <section class="home">

        <div class="container">

            <div class="row">

                @if(Auth::user()->userTypeId==1)
                @include('user-web.layouts.sidebar')
                @else
                @include('business.layouts.sidebar')
                @endif
                <div class="col-lg-6 ">
                    <div class="card">
                        <div class="card-body"> 
                            <h3 class="card-title">{{__('msg.bulletin_board')}}</h3>
                            
                            <div class="row">
                                    @foreach($bulletinBoard as $board)
                                
                                <div class="col-lg-4">
                                     <a href= "{{route('BulletinBoardView',['id' => $board->bullitenId, 'title' =>$board->title])}}">   
                                    <div class="card product-card">
                                       
                                            <img class="card-img" src = "https://images.unsplash.com/photo-1569959358107-5f78a38c029c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80"></img>
                                        <div class = "card-body">
                                            <h3 class="card-title">{{$board->title ?? ''}} </h3>
                                            <p class="card-text">{{$board->body}}</p>
                                            <a class="btn btn-light btn-small w-100" href="{{route('DeleteBulletinBoard',[$board->bullitenId])}}"><i class="fas fa-trash-alt me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                    </a>       

                                </div>
                                
                                @endforeach      
                                  
                        </div>            
                    </div>
                </div>
                    <div id="react-container"></div>

                </div>
                <div class="col-lg-3">
                    
                    <div class="card">
                        <div class="card-body"> 
                            <h3 class="card-title">Add Board</h3>
                            <form method = "post" action = "{{route('AddBulletinBoard')}}">
                                @csrf
                              <!-- Name input -->
                              <div class="input-wrapper mb-3">
                                <label class="form-label" for="form4Example1" >Title</label>
                                <input type="text" id="form4Example1" class="form-control"  name ="board_title" />
                              </div>
                            
                            
                              <!-- Message input -->
                              <div class="input-wrapper mb-3">
                                <label class="form-label" for="form4Example3">Description</label>
                                <textarea class="form-control" id="form4Example3" rows="4" name = "board_body"></textarea>
                              </div>
                            
                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary">
                                Add
                              </button>
                            </form>         
                    </div>
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