@inject('model', '\App\Domains\Special\Models\Special')

@extends('backend.layouts.app')

@section('title', __('Update Special Worker'))

@section('content')
    <x-forms.post :action="route('admin.special.update', $special)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Special Worker')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.worker.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <input type="hidden" name="id" value="{{$special->id}}" />



                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="name" value="{{ old('title')?? $special->title}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="worker_id" class="col-md-2 col-form-label">@lang('Worker')</label>
                    <div class="col-md-10">
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="" selected disabled>@lang('-- Select --')</option>
                            @foreach ($workers as $value)
                                @if($value->id == $special->worker_id)
                                <option selected value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                                    <option  value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Special Worker')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

