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
                            <h3 class="card-title">{{$title}}</h3>
                           
                            <form method = "post" action = "{{route('AddBulletinNote')}}">
                                @csrf
                              <!-- Name input -->
                              <div class="form-outline mb-4">
                                <input type="text" id="form4Example1" class="form-control"  name ="note_title" />
                                <label class="form-label" for="form4Example1" >Title</label>
                              </div>
                            
                            
                              <!-- Message input -->
                              <div class="form-outline mb-4">
                                <textarea class="form-control" id="form4Example3" rows="4" name = "note_body"></textarea>
                                <label class="form-label" for="form4Example3">Description</label>
                              </div>
                              
                              <input type = "hidden" name = "bulletinId" value = {{$bulletinId}}>
                            
                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary btn-block mb-4">
                                Add
                              </button>
                            </form>
                            <div class="row">
                                
                                    @foreach($bulletinNotes as $note)
                                
                                <div class="col-lg-4">
                                     <a href= "{{route('EditBulletinNote',['id' => $note->bullitenNoteId])}}">   
                                    <div class="card product-card">
                                       
                                        <div class = "card-body">
                                            
                                            
                                            <h3 class="card-title">{{$note->title ?? ''}} </h3>
                                            <p >{{$note->body}}</p>
                                        </div>
                                    </div>
                                    </a>       

                                </div>
                                
                                @endforeach      
                                  
                        </div>            
                    </div>
                </div>
                <div id="react-container">
	                            </div>

            </div>

        </div>



    </section>

</div>

<div class="modal fade" id="addBulletinBoard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form method = "post" action = "{{route('AddBulletinBoard')}}">
                                @csrf
                              <!-- Name input -->
                              <div class="form-outline mt-5 px-2">
                                <input name = "board_title"  type="text" id="form4Example1" class="form-control" />
                                <label class="form-label" for="form4Example1" >Title</label>
                              </div>
                            
                            
                             
                            
                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary btn-block mb-4 mt-8 ">
                                Add
                              </button>
                            </form>
        </div>
    </div>
</div>

  @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.footer')
                @else
                    @include('business.layouts.footer')
                    @endif