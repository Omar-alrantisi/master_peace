<x-livewire-tables::bs4.table.cell>
    {{ $row->title}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if(!empty($row->image))
        <img src="{{url('storage/categories/images/'.$row->image)}}" width="50" height="50" loading="lazy" />
    @else
        @lang('No Image')
    @endif
</x-livewire-tables::bs4.table.cell>


<x-livewire-tables::bs4.table.cell>
    @include('backend.lookups.category.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
