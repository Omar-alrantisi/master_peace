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
        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
        }

    </style>
</head>
<body>
{{--@include('includes.partials.read-only')--}}
{{--@include('includes.partials.logged-in-as')--}}
{{--@include('includes.partials.announcements')--}}

@extends('frontend.includes.master')

@section('content')
    <div class="bg-light">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-4">About us page</h1>
                    <p class="lead text-muted mb-0">This web application is considered important to the people who want to find
                        technicians. It will make it easy for them to find the best choice and the best price
                        as well as it will save time and effort for both customers and technicians of to
                        communicate easily with customers, they only have to open Networx website and
                        look through this system and see all the choices in this website.</p>

                </div>
                <div class="col-lg-6 d-none d-lg-block"><img src="{{asset('public-img/ab1.png')}}" alt="" class="img-fluid"></div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h3 class="font-weight-light">Objective</h3>
                    <p class="font-italic text-muted mb-4">The main objective of the website is: “To develop a comprehensive
                        system that allows to the user who wants to find a technician”.</p>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{asset('public-img/ab2.png')}}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 mx-auto"><img src="{{asset('public-img/ab3.png')}}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                <div class="col-lg-6">
                    <h3 class="font-weight-light">about</h3>
                    <p class="font-italic text-muted mb-4"> Every year the number of new technicians increases, which means an
                        increase in the maintenance process, more effort, and more time spent
                        searching for a person who wants to work or find a technicians.</p>
                </div>
            </div>
        </div>
    </div>



            </div>
        </div>
    </div>
@endsection





