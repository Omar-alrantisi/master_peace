<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Domains\Message\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MessagesTable extends DataTableComponent
{
    /**
     * @return array
     */
    public function columns():array
    {
        return [
            Column::make(__('Full Name'),'full_name')
                ->searchable()
                ->sortable(),
            Column::make(__('Email'),'email')
                ->searchable()
                ->sortable(),
            Column::make(__('User Type'),'user_type')
                ->searchable()
                ->sortable(),
            Column::make(__('Message'),'message')
                ->searchable()
                ->sortable(),
//            Column::make(__('Actions'))
        ];
    }
    /**
     * @return Builder
     */
    public function query() : Builder
    {
        return Message::query()->orderByDesc('created_at');

    }
    /**
     * @return string
     */
//    public function rowView(): string
//    {
//        return 'backend.message.includes.row';
//    }
}
