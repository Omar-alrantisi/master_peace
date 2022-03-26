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
</head>
<body>
{{--@include('includes.partials.read-only')--}}
{{--@include('includes.partials.logged-in-as')--}}
{{--@include('includes.partials.announcements')--}}

@extends('frontend.includes.master')

@section('content')
    <div class="container mt-5 mb-5" >
    <x-forms.post :action="route('frontend.store')" enctype="multipart/form-data">
        <x-backend.card>


            <x-slot name="body">
                @if(session()->has('message'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                    <div class="form-group row">
                        <label for="category_id" class="col-md-2 col-form-label">@lang('Category')</label>
                        <div class="col-md-10">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="" selected disabled>@lang('-- Select --')</option>
                                @foreach ($categories as $value)
                                    <option value="{{$value->id}}">{{$value->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city_id" class="col-md-2 col-form-label">@lang('City')</label>

                        <div class="col-md-10">
                            <select name="city_id" id="city_id" class="form-control" required>
                                <option value="" selected disabled>@lang('-- Select --')</option>
                                @foreach ($cities as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input name="name" id="name" value="{{ old('name')}}" class="form-control" required/>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('Email')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" id="email" value="{{ old('email')}}" class="form-control" required/>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                        <div class="col-md-10">
                            <input name="title" id="title" value="{{ old('title')}}" class="form-control" required/>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                        <div class="col-md-10">
                            <textarea name="description" id="description" class="form-control" >{{ old('description')}}</textarea>

                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="personal_photo	" class="col-md-2 col-form-label">@lang('Personal Photo	')</label>

                        <div class="col-md-10">
                            <input type="file" name="personal_photo" id="personal_photo	" class="form-control" required accept="image/*" />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="gender " class="col-md-2 col-form-label">@lang('Gender ')</label>

                        <div class="col-md-10">
                            <label for="male"  class="col-sm-1 col-form-label">@lang('Male')</label>
                            <input  type="radio"  name="gender" id="male" value="1"/>
                            <label for="female" class="col-sm-1 col-form-label">@lang('Female')</label>
                            <input type="radio" name="gender" id="female" value="0"/>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="additional_mobile_number" class="col-md-2 col-form-label">@lang('Mobile Number')</label>

                        <div class="col-md-10">
                            <input name="additional_mobile_number" id="additional_mobile_number" value="{{old('additional_mobile_number')}}" class="form-control" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="dob" class="col-md-2 col-form-label">@lang('Date Of Berith')</label>

                        <div class="col-md-10">
                            <input type="date" name="dob" id="dob" value="{{old('dob')}}" class="form-control" required/>
                        </div>
                    </div><!--form-group-->



                <div class="form-group row">
                    <label for="area" class="col-md-2 col-form-label">@lang('Area')</label>

                    <div class="col-md-10">
                        <input name="area" id="area" value="{{ old('area')}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->





                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">@lang('Start Price')</label>

                    <div class="col-md-10">
                        <input type="number" name="price" id="price" value="{{ old('price')}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="years_of_experience" class="col-md-2 col-form-label">@lang('Years Of Experience')</label>

                    <div class="col-md-10">
                        <input type="number" name="years_of_experience" id="years_of_experience" value="{{ old('years_of_experience')}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="number_of_employees" class="col-md-2 col-form-label">@lang('Number Of Employees')</label>

                    <div class="col-md-10">
                        <input type="number" name="number_of_employees" id="number_of_employees" value="{{ old('number_of_employees')}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image From your work')</label>

                    <div class="col-md-10">
                        <input type="file" name="image" id="image" class="form-control" required accept="image/*" />
                    </div>
                </div><!--form-group-->



</div>




            </x-slot>

            <x-slot name="footer">
                <button style="background-color: #ffb727" class="btn btn-sm  float-right" type="submit">@lang('Send Request')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
    </div>
@endsection

@push('after-scripts')

@endpush



