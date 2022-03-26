@inject('model', '\App\Domains\Lookups\Models\City')

@extends('backend.layouts.app')

@section('title', __('Update City'))

@section('content')
    <x-forms.post :action="route('admin.lookups.city.update', $city)">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update City')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.city.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <input type="hidden" name="id" value="{{$city->id}}" />

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input name="name" id="name" class="form-control" value="{{ old('name') ?? $city->name }}" required/>
                    </div>
                </div><!--form-group-->





            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update City')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
