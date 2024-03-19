@php
use App\Models\MstUser;
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
            <div class="row" >
                @if(Auth::user()->userTypeId==1)
                    @include('user-web.layouts.sidebar')
                @else
                    @include('business.layouts.sidebar')
                @endif
        
        
                <div class="col-lg-9" >
                      <div class="message-wrapper ">
                                <div class="card d-block position-static mw-100">
                                    <h3 class="card-title p-3">Hapi AI Chat</h3>
                                    <div class="card-body">
                                        <div class="message-content-wrapper"  id = "chatgptreply">
                                            
                                             <div class="message-item reply">
                                                
                                            </div>
                                            
                                            <div class="message-item sent" id = "chatgptsent">
                                                
                                            </div>
                                           
                                            
                                        
                                        </div>
                                        <form id="chatgptform" method="POST" action="{{ route('chatgpt.ask') }}">
                            @csrf
                                        <div class="d-flex align-items-end gap-2 p-2">
                                            <input id = "chatgptmessage" type="text" rows="1" class="form-control auto-height-textarea"
                                               name="prompt" placeholder="Ask something..."></input>
                                            <button type="submit" class="btn btn-primary mt-5">Send</button>
                                            </a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <div class="card business-single-card d-none">
                        <div class= "card-header">Try ChatGPT</div>
                        <div class="card-body">
                        <form  method="POST" action="">{{--{{ route('chatgpt.ask') }}--}}
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control text-center" name="prompt" placeholder="Ask something...">
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Send</button>
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


