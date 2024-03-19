<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-free-5.15.4-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aksFileUpload.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/scss/style1.css')}}">
     <link rel="icon" type="image/png" href="{{asset('assets/img/png/favicon.png')}}"> 
    @if(Auth::User()->userTypeId==1)
    <title>Hapiverse User</title>
    @else
    <title>Hapiverse Business</title>
    @endif
    </head>