<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href={{asset("views/css/style.css")}}>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Networx</title>
{{--        <meta name="description" content="@yield('meta_description', appName())">--}}
{{--        <meta name="author" content="@yield('meta_author', 'Vibes Solutions')">--}}
        @yield('meta')

        @stack('before-styles')
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }



            .m-b-md {
                margin-bottom: 30px;
            }
            .swiper-slide img {
                display: block;
                width: 100% !important;
                height: 60% !important;
                object-fit: cover;
                margin: auto;
            }
        </style>
        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        @include('includes.partials.announcements')

        @extends('frontend.includes.master')

        @section('content')

            {{-- Start Banner --}}

            <section class="banner-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banner-left">


                                <h1 class="banner-left-heading">Find Local <span class="banner-left-span"> professionals </span> for anything you need done.</h1>

                                    <form action="{{ route('frontend.search') }}" method="GET">
                                        <div class="input-group">
                                    <input type="search" name="search" class="form-control rounded" required placeholder="Search" aria-label="Search" aria-describedby="search-addon"  />
                                    <button type="submit" class="btn-banner" style="height: 38px">search</button>
                                        </div>
                                    </form>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="banner-right">
                                <img src="public-img/banner.png" alt="" srcset="">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- End Banner --}}


            {{-- Start Section Gategory --}}
            <section class="categories-section">
                <div class="categories-section-title">
                    <h2 style="text-align: center">Browse By Category</h2>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)

                        <div class="swiper-slide d-flex flex-column align-items-center">
                            <div class="main-slide ">

                                <a href="{{ route('frontend.single_category',$category->id )}}"style="text-decoration: none">
                                <div> <img src="{{asset('../storage/categories/images/'.$category->image)}}"  alt="" srcset=""></div>
                                <div class=""><h1 style="font-size: 20px ;color:black" >{{$category->title}}</h1></div>
                                </a>

                            </div>
                        </div>
                        @endforeach


                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            {{-- End Section Gategory --}}


            {{-- Start Explore Section --}}
            <section class="banner-section">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banner-left">

                                <div class="section-explore-left">

                                    <p>When you need to hire someone – a landscaper, a DJ, anyone – Thumbtack</p>
                                    <p>finds them for you for free.
                                        See price estimates, read reviews and chat with pros, all in the website.</p>
                                  <a href="{{route("frontend.categories")}}">  <button type="button" class="btn-explore">Explore</button></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="banner-right-section3">
                                <img src="public-img/explore.png" alt="" srcset="">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- End Explore Section --}}

            {{-- Start Hire Section --}}

            <section class="hire-section">
                <div class="container">
                    <div class="hire-section-title">
                        <h2 style="text-align: center">Why Hire Professionals On NETWOR<span class="web-color">X</span>?</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="part">
                                <i class="fas fa-dollar-sign"></i>

                                <h3>Free to use</h3>
                                <p>You never pay to use Thumbtack: Get cost estimates, contact pros, and even book the job—all for no cost.</p>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="part">


                                <i class="fa fa-users"></i>
                                <h3>Compare prices side-by-side</h3>
                                <p>You’ll know how much your project costs even before booking a pro.</p>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="part">
                                <i class="fa fa-check"></i>
                                <h3>Hire with confidence</h3>
                                <p>With access to 1M+ customer reviews and the pros’ work history, you’ll have all the info you need to make a hire.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- End Hire Section --}}

            {{-- Start Explore Section --}}
            <section class="banner-section">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banner-right-section3">
                                <img src="public-img/work.png" alt="" srcset="">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-left">


                                <div class="section-explore-left">

                                    <p>When you need to hire someone – a landscaper, a DJ, anyone – Thumbtack</p>
                                    <p>finds them for you for free.
                                        See price estimates, read reviews and chat with pros, all in the website.</p>
                                   <a href="{{route("frontend.categories")}}"> <button type="button" class="btn-explore">Explore</button></a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            {{-- End Explore Section --}}

            {{-- Testamonials Section Start --}}

            <div class="container-lg" style="margin-bottom: 100px; margin-top:100px">
                <div class="row">
                    <div class="col-sm-12" style="text-align: center">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <h2 style="margin-bottom: 80px;">Customer <b>Testimonials</b></h2>
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="testimonial">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante.</p>
                                            </div>
                                            <div class="media">
                                                <img src="{{asset('public-img/ts1.jpeg')}}" class="mr-3" alt="">
                                                <div class="media-body">
                                                    <div class="overview">
                                                        <div class="name"><b>Paula Wilson</b></div>
                                                        <div class="details">Media Analyst / SkyNet</div>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="testimonial">
                                                <p>Vestibulum quis quam ut magna consequat faucibu. Eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus quam.</p>
                                            </div>
                                            <div class="media">
                                                <img src="{{asset('public-img/ts2.jpg')}}" class="mr-3" alt="">
                                                <div class="media-body">
                                                    <div class="overview">
                                                        <div class="name"><b>Antonio Moreno</b></div>
                                                        <div class="details">Web Developer / SoftBee</div>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="testimonial">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante.</p>
                                            </div>
                                            <div class="media">
                                                <img src="/examples/images/clients/3.jpg" class="mr-3" alt="">
                                                <div class="media-body">
                                                    <div class="overview">
                                                        <div class="name"><b>Michael Holz</b></div>
                                                        <div class="details">Web Developer / DevCorp</div>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="testimonial">
                                                <p>Vestibulum quis quam ut magna consequat faucibu. Eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus quam.</p>
                                            </div>
                                            <div class="media">
                                                <img src="/examples/images/clients/4.jpg" class="mr-3" alt="">
                                                <div class="media-body">
                                                    <div class="overview">
                                                        <div class="name"><b>Mary Saveley</b></div>
                                                        <div class="details">Graphic Designer / MarsMedia</div>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="testimonial">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante.</p>
                                            </div>
                                            <div class="media">
                                                <img src="/examples/images/clients/5.jpg" class="mr-3" alt="">
                                                <div class="media-body">
                                                    <div class="overview">
                                                        <div class="name"><b>Martin Sommer</b></div>
                                                        <div class="details">SEO Analyst / RealSearch</div>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="testimonial">
                                                <p>Vestibulum quis quam ut magna consequat faucibu. Eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus quam.</p>
                                            </div>
                                            <div class="media">
                                                <div class="media-left d-flex mr-3">
                                                    <img src="/examples/images/clients/6.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="overview">
                                                        <div class="name"><b>John Williams</b></div>
                                                        <div class="details">Web Designer / UniqueDesign</div>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Carousel controls -->
                            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



{{-- End Tastanonials Section --}}

@endsection

