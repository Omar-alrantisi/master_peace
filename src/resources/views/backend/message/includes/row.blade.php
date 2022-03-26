<x-livewire-tables::bs4.table.cell>
    {{ $row->full_name}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->email}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if(($row->usertype==0))
       @lang('Worker')
    @else
        @lang('User')
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->message}}
</x-livewire-tables::bs4.table.cell>


{{--<x-livewire-tables::bs4.table.cell>--}}
{{--    @include('backend.message.includes.actions', ['model' => $row])--}}
{{--</x-livewire-tables::bs4.table.cell>--}}
