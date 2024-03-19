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
                            <h3 class="card-title">Edit Note </h3>
                            @foreach($bulletinNotes as $bulletinNote)
                            <form method = "post" action = "{{route('EditNote',[$bulletinNote->bullitenNoteId])}}">
                                @csrf
                              <!-- Name input -->
                              <div class="form-outline mb-4">
                                <input type="text" id="form4Example1" class="form-control"  name ="title" value = "{{$bulletinNote->title}}"/>
                                <label class="form-label" for="form4Example1" >Title</label>
                              </div>
                            
                            
                              <!-- Message input -->
                              <div class="form-outline mb-4">
                                <textarea class="form-control" id="form4Example3" rows="4" name = "body" >{{$bulletinNote->body}}</textarea>
                                <label class="form-label" for="form4Example3">Description</label>
                              </div>
                       
                            
                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary btn-block mb-4">
                                Save
                              </button>
                              <button class="btn btn-primary btn-block mb-4">
                                Comment
                              </button>
                            </form>
                            
                           
                            @endforeach
                            <div class="row">
                                
                                   
                                  
                        </div>            
                    </div>
                </div>
                <div id="react-container">
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