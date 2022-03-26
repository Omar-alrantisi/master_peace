@extends('backend.layouts.app')

@section('title', __('Create City'))

@section('content')
    <x-forms.post :action="route('admin.lookups.city.store')" >
        <x-backend.card>
            <x-slot name="header">
                @lang('Create City')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.city.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input name="name" id="name" value="{{ old('name')}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->



            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create City')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
