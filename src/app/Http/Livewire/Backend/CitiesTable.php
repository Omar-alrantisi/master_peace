<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Domains\Lookups\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CitiesTable extends DataTableComponent
{
    /**
     * @return array
     */
    public function columns():array
    {
        return [
            Column::make(__('Name'),'name')
                ->searchable()
                ->sortable(),

            Column::make(__('Actions'))
        ];
    }
    /**
     * @return Builder
     */
    public function query() : Builder
    {
        return City::query()->orderByDesc('created_at');

    }
    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.lookups.city.includes.row';
    }
}
