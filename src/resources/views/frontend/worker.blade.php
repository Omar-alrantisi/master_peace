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
        body{
            color: #6F8BA4;
            margin-top:20px;
        }
        .section {
            padding: 100px 0;
            position: relative;
        }
        .gray-bg {
            background-color: #f5f5f5;
        }
        img {
            max-width: 100%;
        }
        img {
            vertical-align: middle;
            border-style: none;
        }
        /* About Me
        ---------------------*/
        .about-text h3 {
            font-size: 45px;
            font-weight: 700;
            margin: 0 0 6px;
        }
        @media (max-width: 767px) {
            .about-text h3 {
                font-size: 35px;
            }
        }
        .about-text h6 {
            font-weight: 600;
            margin-bottom: 15px;
        }
        @media (max-width: 767px) {
            .about-text h6 {
                font-size: 18px;
            }
        }
        .about-text p {
            font-size: 18px;
            max-width: 450px;
        }
        .about-text p mark {
            font-weight: 600;
            color:#ffb727;
        }

        .about-list {
            padding-top: 10px;
        }
        .about-list .media {
            padding: 5px 0;
        }
        .about-list label {
            color: #ffb727;
            font-weight: 600;
            width: 88px;
            margin: 0;
            position: relative;
        }
        .about-list label:after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            right: 11px;
            width: 1px;
            height: 12px;
            background: #ffb727;
            -moz-transform: rotate(15deg);
            -o-transform: rotate(15deg);
            -ms-transform: rotate(15deg);
            -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
            margin: auto;
            opacity: 0.5;
        }
        .about-list p {
            margin: 0;
            font-size: 15px;
        }

        @media (max-width: 991px) {
            .about-avatar {
                margin-top: 30px;
            }
        }

        .about-section .counter {
            padding: 22px 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        }
        .about-section .counter .count-data {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .about-section .counter .count {
            font-weight: 700;
            color: #ffb727;
            margin: 0 0 5px;
        }
        .about-section .counter p {
            font-weight: 600;
            margin: 0;
        }
        mark {
            background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
            background-size: 100% 3px;
            background-repeat: no-repeat;
            background-position: 0 bottom;
            background-color: transparent;
            padding: 0;
            color: currentColor;
        }
        .theme-color {
            color: #ffb727;
        }
        .dark-color {
            color: #ffb727;
        }

    </style>
</head>
<body>
{{--@include('includes.partials.read-only')--}}
{{--@include('includes.partials.logged-in-as')--}}
{{--@include('includes.partials.announcements')--}}

@extends('frontend.includes.master')

@section('content')
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">{{$singleWorker->name}}</h3>
                        <h6 class="theme-color lead">{{$singleWorker->title}}</h6>
                        <p>{{$singleWorker->description}}</p>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Birthday</label>

{{--                                    {{echo date_diff(date_create('1970-02-01'), date_create('today'))->y}}--}}
                                    <p>{{($singleWorker->dob)}}</p>
                                </div>
                                <div class="media">
                                    <label>Age</label>
                                    <p>22 Yr</p>
                                </div>
                                <div class="media">
                                    <label>Category</label>
                                    <p>{{$singleWorker->category->title}}</p>
                                </div>
                                <div class="media">
                                    <label>Address</label>
                                    <p>{{$singleWorker->area}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>E-mail</label>
                                    <p>{{$singleWorker->email}}</p>
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <p>{{$singleWorker->additional_mobile_number}}</p>
                                </div>
                                <div class="media">
                                    <label>Gender</label>
                                    @if($singleWorker->gender==1)
                                    <p>Male</p>
                                    @else
                                        <p>Female</p>
                                    @endif
                                </div>
                                <div class="media">
                                    <label>City</label>
                                    <p>{{$singleWorker->city->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img src="{{url('storage/workers/images/'.$singleWorker->image)}}" width="500px" title="" alt="">
                    </div>
                </div>
            </div>
            <div class="counter">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500">{{$singleWorker->years_of_experience}}</h6>
                            <p class="m-0px font-w-600">Years Of Experience</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150">{{$singleWorker->number_of_employees}}</h6>
                            <p class="m-0px font-w-600">Number Of Employees</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850">${{$singleWorker->price}}</h6>
                            <p class="m-0px font-w-600">Start Price</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                            <p class="m-0px font-w-600">Telephonic Talk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="categories-section">
        <div class="categories-section-title">
            <h2 style="text-align: center">Browse By Category</h2>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($singleCategory->worker as $worker)
                    @if($worker->is_verified==1)

                    <div class="swiper-slide d-flex flex-column align-items-center">
                        <div class="main-slide ">

                            <a href="{{ route('frontend.single_category',$worker->id )}}"style="text-decoration: none">
                                <div> <img src="{{asset('../storage/workers/images/'.$worker->image)}}" width="5px" height="20px" alt="" srcset=""></div>
                                <div class=""><h1 style="font-size: 20px ;color:black" >{{$worker->title}}</h1></div>
                            </a>

                        </div>
                    </div>
                    @endif
                @endforeach


            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection





