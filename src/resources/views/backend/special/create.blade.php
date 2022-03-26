@extends('backend.layouts.app')

@section('title', __('Create Special'))

@section('content')
    <x-forms.post :action="route('admin.special.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Special')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.special.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" value="{{ old('title')}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="worker_id" class="col-md-2 col-form-label">@lang('Worker')</label>
                <div class="col-md-10">
                    <select name="worker_id" id="worker_id" class="form-control" required>
                        <option value="" selected disabled>@lang('-- Select --')</option>
                        @foreach ($workers as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                </div><!--form-group-->




            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Special Worker')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>

@endsection

