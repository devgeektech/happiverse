@extends('layouts.app')

@section('scripts')
    <meta name="description" content="Build A Scalable Video Chat Application With Agora" />
    <meta name="keywords" content="Video Call, Agora, Laravel, Real Time Engagement" />
    <meta name="author" content="Kofi Obrasi Ocran" />
    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script>
@endsection

@section('content')
   
    <video-chat :allusers="{{ $users }}" :authUserId="{{ Auth::user()->getUserDetail->userId }}" turn_url="{{ env('TURN_SERVER_URL') }}"
        turn_username="{{ Auth::user()->getUserDetail->userName }}" turn_credential="{{ env('AGORA_APP_ID') }}"/>
@endsection

    
