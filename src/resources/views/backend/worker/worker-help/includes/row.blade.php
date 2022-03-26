
<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->description }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if(!empty($row->image))

        <img src="{{url('storage/workerHelps/images/'.$row->image)}}" width="50" height="50" loading="lazy" />
    @else
        @lang('No Image')
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->worker->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.worker.worker-help.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
