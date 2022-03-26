@extends('backend.layouts.app')

@section('title', __('Create Category'))

@section('content')
    <x-forms.post :action="route('admin.lookups.category.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Category')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.category.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" value="{{ old('title')}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>

                    <div class="col-md-10">
                        <input type="file" name="image" id="image" class="form-control" required/>
                    </div>
                </div><!--form-group-->

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Category')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
