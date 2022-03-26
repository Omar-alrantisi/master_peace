<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href={{asset("views/css/style.css")}}>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Networx</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Vibes Solutions')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    @stack('after-styles')
    <style>
        .contact-image {
            height:170px;
            width:100%;
            background-size:cover;
        }
    </style>
</head>
<body>
{{--@include('includes.partials.read-only')--}}
{{--@include('includes.partials.logged-in-as')--}}
{{--@include('includes.partials.announcements')--}}

@extends('frontend.includes.master')

@section('content')
    <div class="container my-5">
        <div class="row">
            @if(session()->has('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <div class="col-sm text-center">
                <h1 class="div-heading display-4 my-5">Contact US</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('frontend.messageStore')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="full_name" class="form-control" id="exampleInputName" placeholder="Your Full Name..." required>
                    </div>
                    <div class="form-group">
                        <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Address...">
                    </div>
                    <div class="form-group">
                        <select name="user_type" class="form-control" id="exampleFormControlSelect1" placeholder="Select User Type...">
                            <option value="1">Worker</option>
                            <option value="0">User</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <textarea  name="message" placeholder="message..." class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg btn-block">Submit</button>
                </form>
            </div>
            <div  class="col-md-6">
                <h5>Address: <small class="text-muted">Amman,Jordan</small></h5>
                <h5>Email: <small class="text-muted">omaratef.alrantisi@gmail.com</small></h5>
                <h5>Contact: <small class="text-muted">+962 787 318 831 || +962 777 748 129</small></h5>
                <!-- <p><iframe width="600" height="450" frameborder="0" style="border:0"
      src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJtcNatvRsrjsRA38LEBPt_78&key=..." allowfullscreen></iframe></p> -->
                <div class="text-center">
                    <img class="img-fluid contact-image" alt="Responsive image" src="https://csds.qld.edu.au/sdc/resources/images/find-us-map.jpg" class="rounded" alt="...">
                </div>
            </div>

        </div>
    </div>
@endsection





