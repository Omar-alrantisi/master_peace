<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Domains\Lookups\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoriesTable extends DataTableComponent
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
            Column::make(__('Image'),'image')
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
        return Category::query()->orderByDesc('created_at');

    }
        /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.lookups.category.includes.row';
    }
}
