@inject('model', '\App\Domains\Lookups\Models\Product')

@extends('backend.layouts.app')

@section('title', __('Update Product'))

@section('content')
    <x-forms.post :action="route('admin.lookups.product.update', $product ) " enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Product')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.product.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <input type="hidden" name="id" value="{{$product->id}}" />

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" class="form-control" value="{{ old('title') ?? $product->title }}" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">@lang('Price')</label>

                    <div class="col-md-10">
                        <input name="price" id="price" class="form-control" value="{{ old('price') ?? $product->price }}" required/>
                    </div>
                </div><!--form-group-->


                <div class="form-group row">
                    <label for="sale_price" class="col-md-2 col-form-label">@lang('Sale_price')</label>

                    <div class="col-md-10">
                        <input name="sale_price" id="sale_price" class="form-control" value="{{ old('sale_price') ?? $product->sale_price }}" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('short_desc')</label>

                    <div class="col-md-10">
                        <input name="short_desc" id="short_desc" class="form-control" value="{{ old('short_desc') ?? $product->short_desc }}" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Category')</label>
                <div class="col-md-10">
                    <select name="category_id" id="category" class="form-control" required/>
                    <option selected value="">{{__('Select')}}</option>
                        @foreach($categories as $category)
                        @if($category->id == $product->category_id)
                            <option selected value="{{$category->id}}">{{$category->title}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endif
                        @endforeach
                        </select>

                </div><!--form-group-->
                </div>
                <div class="form-group row">
                    <label for="img" class="col-md-2 col-form-label">@lang('img')</label>
                    <div class="col-md-6">
                        <input type="file" name="img" id="img" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <img id="cover_imgShow" src="{{url('storage/product/img/'.$product->img)}}" width="50" height="50" loading="lazy" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="desc" class="col-md-2 col-form-label">@lang('Desc')</label>

                    <div class="col-md-10">
                        <input name="desc" id="desc" class="form-control" value="{{ old('desc') ?? $product->desc}}" required/>
                    </div>
                </div><!--form-group-->



            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Category')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
