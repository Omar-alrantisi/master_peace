<x-livewire-tables::bs4.table.cell>
    {{ $row->title}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->price}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->sale_price}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->short_desc}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if(!empty($row->img))
        <img src="{{url('storage/product/img/'.$row->img)}}" width="50" height="50" loading="lazy" />
    @else
        @lang('No Image')
    @endif</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
{{--    {{ $row->category_id}}--}}
{{ $row->category->title}}
</x-livewire-tables::bs4.table.cell>


<x-livewire-tables::bs4.table.cell>
    {{ $row->desc}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.lookups.product.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
