<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Domains\Lookups\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductsTable extends DataTableComponent
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
            Column::make(__('Price'),'price')
                ->searchable()
                ->sortable(),
            Column::make(__('Sale_price'),'sale_price')
                ->searchable()
                ->sortable(),
            Column::make(__('Short_desc'),'short_desc')
                ->searchable()
                ->sortable(),
            Column::make(__('Image'),'img')
                ->searchable()
                ->sortable(),
            Column::make(__('Category'),'category_id')
                ->searchable()
                ->sortable(),
            Column::make(__('Description'),'desc')
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
        return Product::query()->orderByDesc('created_at');
        // return Category::query();
    }
    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.lookups.product.includes.row';
    }
}
