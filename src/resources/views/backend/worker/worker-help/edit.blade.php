@inject('model', '\App\Domains\Worker\Models\WorkerHelp')

@extends('backend.layouts.app')

@section('title', __('Update Worker Help'))

@section('content')
    <x-forms.post :action="route('admin.workerHelp.update', $workerHelp)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Worker Help')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.workerHelp.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <input type="hidden" name="id" value="{{$workerHelp->id}}" />



                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" class="form-control" value="{{ old('title') ?? $workerHelp->title }}" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <textarea name="description" id="description" class="form-control" >{{ old('description')??$workerHelp->description}}</textarea>

                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-6">
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <img id="cover_imgShow" src="{{url('storage/workerHelps/images/'.$workerHelp->image)}}" width="50" height="50" loading="lazy" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="city_id" class="col-md-2 col-form-label">@lang('Worker')</label>

                    <div class="col-md-10">
                        <select name="worker_id" id="worker_id" class="form-control" required>
                            @foreach ($workers as $value)
                                @if($value->id == $workerHelp->worker_id)
                                    <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->




            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Worker Help')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
