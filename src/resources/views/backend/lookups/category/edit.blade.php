@inject('model', '\App\Domains\Lookups\Models\Category')

@extends('backend.layouts.app')

@section('title', __('Update Category'))

@section('content')
    <x-forms.post :action="route('admin.lookups.category.update', $category)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Category')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.category.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <input type="hidden" name="id" value="{{$category->id}}" />

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" class="form-control" value="{{ old('title') ?? $category->title }}" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-6">
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <img id="cover_imgShow" src="{{url('storage/categories/images/'.$category->image)}}" width="50" height="50" loading="lazy" />
                    </div>
                </div><!--form-group-->



            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Category')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
