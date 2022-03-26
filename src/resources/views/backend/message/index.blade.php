@extends('backend.layouts.app')

@section('title', __('Message Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Message Management')
        </x-slot>


        <x-slot name="body">
            <livewire:backend.messages-table />
        </x-slot>
    </x-backend.card>
@endsection
