@inject('model', '\App\Domains\Worker\Models\Worker')

@extends('backend.layouts.app')

@section('title', __('Update Worker'))

@section('content')
    <x-forms.post :action="route('admin.worker.update', $worker)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Worker')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.worker.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <input type="hidden" name="id" value="{{$worker->id}}" />



                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input name="name" id="name" class="form-control" value="{{ old('name') ?? $worker->name }}" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('Email')</label>

                    <div class="col-md-10">
                        <input type="email" name="email" id="email" value="{{ old('email')?? $worker->email}}" class="form-control" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="dob" class="col-md-2 col-form-label">@lang('Date Of Berith')</label>

                    <div class="col-md-10">
                        <input type="date" name="dob" id="dob" value="{{ old('dob') ?? $worker->dob }}" class="form-control" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="personal_photo" class="col-md-2 col-form-label">@lang('Personal Photo')</label>
                    <div class="col-md-6">
                        <input type="file" name="personal_photo" id="personal_photo" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <img id="image" src="{{url('storage/workers/images/'.$worker->personal_photo)}}" width="50" height="50" loading="lazy" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="gender " class="col-md-2 col-form-label">@lang('Gender ')</label>

                    <div class="col-md-10">
                        <label  for="male"  class="col-md-1 col-form-label">@lang('Male')</label>
                        <input  type="radio" {{$worker->gender == 1 ? 'checked' : ''}}  name="gender" id="male" value="1"/>
                        <label for="female" class="col-md-1 col-form-label">@lang('Female')</label>
                        <input type="radio" {{$worker->gender == 0 ? 'checked' : ''}} name="gender" id="female" value="0"/>
                    </div>
                </div><!--form-group-->


                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" class="form-control" value="{{ old('title') ?? $worker->title }}" required/>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <textarea name="description" id="description" class="form-control">{{ old('description') ?? $worker->description }}</textarea>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="area" class="col-md-2 col-form-label">@lang('Area')</label>

                    <div class="col-md-10">
                        <input name="area" id="area" class="form-control" value="{{ old('area') ?? $worker->area }}" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">@lang('Price')</label>

                    <div class="col-md-10">
                        <input name="price" id="price" class="form-control" value="{{ old('price') ?? $worker->price }}" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="years_of_experience" class="col-md-2 col-form-label">@lang('Years Of Experience')</label>

                    <div class="col-md-10">
                        <input name="years_of_experience" id="years_of_experience" class="form-control" value="{{ old('years_of_experience') ?? $worker->years_of_experience }}" required/>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="number_of_employees" class="col-md-2 col-form-label">@lang('Number Of Employees')</label>

                    <div class="col-md-10">
                        <input name="number_of_employees" id="number_of_employees" class="form-control" value="{{ old('number_of_employees') ?? $worker->number_of_employees }}" required/>
                    </div>
                </div><!--form-group-->





                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>
                    <div class="col-md-6">
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <img id="image" src="{{url('storage/workers/images/'.$worker->image)}}" width="50" height="50" loading="lazy" />
                    </div>
                </div><!--form-group-->





                <div class="form-group row">
                    <label for="city_id" class="col-md-2 col-form-label">@lang('City')</label>

                    <div class="col-md-10">
                        <select name="city_id" id="city_id" class="form-control" required>
                            @foreach ($cities as $value)
                                @if($value->id == $worker->city_id)
                                    <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->


                <div class="form-group row">
                    <label for="category_id" class="col-md-2 col-form-label">@lang('Category')</label>

                    <div class="col-md-10">
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach ($categories as $value)
                                @if($value->id == $worker->category_id)
                                    <option value="{{$value->id}}" selected>{{$value->title}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->
                <!--form-group-->
                <div class="form-group row">
                    <label for="is_verified" class="col-md-2 col-form-label">@lang('Is Verified')</label>

                    <div class="col-md-1">
                        <input type="checkbox" name="is_verified" value="{{ old($worker->is_verified) ?? ($worker->is_verified == 0)?'no':'yes'}}" {{$worker->is_verified == 1 ? 'checked' : ''}} id="is_verified" />
                    </div>
                </div><!--form-group-->

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Worker')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#is_verified').on('change', function(){
                this.value = this.checked ? 'yes' : 'no';
            }).change();  });
    </script>
@endpush
