<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->worker->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.special.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
