@extends('backend.layouts.app')

@section('title', __('Special Worker Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Special Worker Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.special.create')"
                    :text="__('Create Special Worker')"
                />
            </x-slot>
        @endif
        <x-slot name="body">
            <livewire:backend.specials-table />
        </x-slot>
    </x-backend.card>
@endsection
