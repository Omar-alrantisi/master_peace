@extends('backend.layouts.app')

@section('title', __('Create Product'))

@section('content')
    <x-forms.post :action="route('admin.lookups.product.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Country')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.product.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>

                    <div class="col-md-10">
                        <select name="category_id" id="category" class="form-control" required/>
                           @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                    </select>


                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">@lang('Price')</label>

                    <div class="col-md-10">
                        <input name="price" id="price" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="sale_price" class="col-md-2 col-form-label">@lang('sale_price')</label>

                    <div class="col-md-10">
                        <input name="sale_price" id="sale_price" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="short_desc" class="col-md-2 col-form-label">@lang('short_desc')</label>

                    <div class="col-md-10">
                        <input name="short_desc" id="short_desc" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="img" class="col-md-2 col-form-label">@lang('img')</label>

                    <div class="col-md-10">
                        <input type="file" name="img" id="img" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="desc" class="col-md-2 col-form-label">@lang('Desc')</label>

                    <div class="col-md-10">
{{--                        <textarea name="desc" id="desc" class="form-control" required></textarea>--}}
                        <input name="desc" id="desc" class="form-control" required/>
                    </div>
                </div><!--form-group-->

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create category')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
