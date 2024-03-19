@extends('layouts.app')

@section('scripts')
    <meta name="description" content="Build A Scalable Video Chat Application With Agora" />
    <meta name="keywords" content="Video Call, Agora, Laravel, Real Time Engagement" />
    <meta name="author" content="Kofi Obrasi Ocran" />
    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script>
@endsection

@section('content')
    <agora-chat :allusers="{{ $users }}" authuserid="{{ Auth::user()->getUserDetail->userId }}" authuser="{{ Auth::user()->getUserDetail->userName }}"
        agora_id="{{ env('AGORA_APP_ID') }}" />
@endsection

    
        

      
 

