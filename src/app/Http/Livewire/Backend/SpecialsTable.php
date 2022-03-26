<?php

namespace App\Http\Livewire\Backend;


use Livewire\Component;
use App\Domains\Special\Models\Special;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SpecialsTable extends DataTableComponent
{
    /**
     * @return array
     */
    public function columns():array
    {
        return [
            Column::make(__('Title'),'title')
                ->searchable()
                ->sortable(),
            Column::make(__('Worker'),'worker_id')
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
        return Special::query()->orderByDesc('created_at');

    }
    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.special.includes.row';
    }
}
