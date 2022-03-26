<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Lookups\Models\Category;
use App\Domains\Lookups\Models\City;
use Livewire\Component;
use App\Domains\Worker\Models\Worker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class WorkersTable extends DataTableComponent
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
            Column::make(__('Age'),'age')
                ->searchable()
                ->sortable(),
            Column::make(__('Title'),'title')
                ->searchable()
                ->sortable(),
            Column::make(__('Area'),'area')
                ->searchable()
                ->sortable(),
            Column::make(__('Description'),'description')
                ->searchable()
                ->sortable(),
            Column::make(__('Image'),'image')
                ->searchable()
                ->sortable(),
            Column::make(__('Price'),'price')
                ->searchable()
                ->sortable(),
            Column::make(__('Years Of Experience'),'years_of_experience')
                ->searchable()
                ->sortable(),
            Column::make(__('Number Of Employees'),'number_of_employees')
                ->searchable()
                ->sortable(),
            Column::make(__('City'),'city_id')
                ->searchable()
                ->sortable(),
            Column::make(__('Category'),'category_id')
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
        $query = Worker::query()
            ->when($this->getFilter('cityFilter'), fn ($query, $cityFilter) => $query->where('city_id', $cityFilter))
            ->when($this->getFilter('categoryFilter'), fn ($query, $categoryFilter) => $query->where('category_id', $categoryFilter))
            ->when($this->getFilter('isVerifiedFilter'), fn ($query, $isVerifiedFilter) => $isVerifiedFilter === 'true' ? $query->where('is_verified', 1) : $query->where('is_verified', 0))
            ->orderByDesc('created_at');
        return $query;


    }

    public function filters(): array
    {
        return [
            'cityFilter' => Filter::make(__('City'))
                ->select(City::query()
                    ->select(['id','name'])
                    ->get()
                    ->prepend((object)[
                        'id' => '',
                        'name' => __('All')
                    ])
                    ->pluck('name','id')->toArray()),

            'categoryFilter' => Filter::make(__('Category'))
                ->select(Category::query()
                    ->select(['id','title'])
                    ->get()
                    ->prepend((object)[
                        'id' => '',
                        'title' => __('All')
                    ])
                    ->pluck('title','id')->toArray()),

            'isVerifiedFilter' => Filter::make('Is Verified')
                ->select([
                    '' => __('All'),
                    'true' => __('Verified'),
                    'false' => __('Unverified'),
                ]),
        ];
    }
    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.worker.includes.row';
    }
}
