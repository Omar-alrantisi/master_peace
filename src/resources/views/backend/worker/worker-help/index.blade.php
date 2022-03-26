@extends('backend.layouts.app')

@section('title', __('Worker Help Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Worker Help Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.workerHelp.create')"
                    :text="__('Create Worker Help')"
                />
            </x-slot>
        @endif
        <x-slot name="body">
            <livewire:backend.worker-helps-table/>
        </x-slot>
    </x-backend.card>
@endsection
