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
        /*
** Style Simple Ecommerce Theme for Bootstrap 4
** Created by T-PHP https://t-php.fr/43-theme-ecommerce-bootstrap-4.html
*/
        .bloc_left_price {
            color: #ffb727 !important;
            text-align: center;
            font-weight: bold;
            font-size: 150%;
        }
        .category_block li:hover {
            background-color: #ffb727 !important;
        }
        .category_block li:hover a {
            color: #ffffff;
        }
        .category_block li a {
            color: #343a40;
        }
        .add_to_cart_block .price {
            color: #ffb727 !important;
            text-align: center;
            font-weight: bold;
            font-size: 200%;
            margin-bottom: 0;
        }
        .add_to_cart_block .price_discounted {
            color: #343a40;
            text-align: center;
            text-decoration: line-through;
            font-size: 140%;
        }
        .product_rassurance {
            padding: 10px;
            margin-top: 15px;
            background: #ffffff;
            border: 1px solid #6c757d;
            color: #6c757d;
        }
        .product_rassurance .list-inline {
            margin-bottom: 0;
            text-transform: uppercase;
            text-align: center;
        }
        .product_rassurance .list-inline li:hover {
            color: #343a40;
        }
        .reviews_product .fa-star {
            color: gold;
        }
        .pagination {
            margin-top: 20px;
        }
        footer {
            background: #343a40;
            padding: 40px;
        }
        footer a {
            color: #f8f9fa!important
        }

    </style>
</head>
<body>
{{--@include('includes.partials.read-only')--}}
{{--@include('includes.partials.logged-in-as')--}}
{{--@include('includes.partials.announcements')--}}

@extends('frontend.includes.master')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Explore Workers</h1>
            <p class="lead text-muted mb-0">Sometimes, getting started is the hardest part. That’s why we created Project Guides full of advice from Networx workers. Find out what things cost, how long they take and who you should hire.</p>
        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card bg-light mb-3">
                    <div class="card-header  text-white text-uppercase" style="background-color: #ffb727"><i class="fa fa-list"></i> Categories</div>
                    <ul class="list-group category_block">
                        @foreach($categories as $category)
                        <li class="list-group-item"><a href={{ route('frontend.single_category',$category->id )}}>{{$category->title}}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header  text-white text-uppercase" style="background-color: #ffb727">Special Worker</div>
                    <div class="card-body">
                        <img class="img-fluid" src="https://dummyimage.com/600x400/55595c/fff" />
                        <h5 class="card-title">Product title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="bloc_left_price">99.00 $</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    @if($getWorkers->isNotEmpty())
                    @foreach($getWorkers as $worker)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('../storage/workers/images/'.$worker->image)}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">{{$worker->name}}</h4>
                                <p class="card-text">{{$worker->title}}</p>
                                <div class="row">
                                    <div class="col">
                                       <a href="{{ route('frontend.single_worker',$worker->id )}}"><p class="btn  btn-block" style="background-color: #ffb727">Explore</p></a>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    @endforeach
                    @else
                        <h1 style="color:#dc3545">No workers found</h1>
                    @endif
                    <div class="col-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection





