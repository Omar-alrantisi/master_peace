<?php
use Tabuna\Breadcrumbs\Trail;

use App\Domains\Message\Models\Message;
use App\Domains\Worker\Models\WorkerHelp;
use App\Domains\Message\Http\Controllers\Backend\MessageController;
use App\Domains\Worker\Http\Controllers\Backend\WorkerHelpController;


/**
 * Message Routes
 */
Route::group([
    'prefix' => 'message',
    'as' => 'message.'
], function () {
    Route::get('create', [MessageController::class, 'create'])
        ->name('messageCreate')
        ->middleware('permission:admin.worker.store')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.message.index')
                ->push(__('Create Message'), route('admin.message.create'));
        });

    Route::post('messageStore', [MessageController::class, 'store'])
        ->name('store');


    Route::get('/', [MessageController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.message.list|admin.worker.message|admin.worker.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Message Management'), route('admin.message.index'));
        });

    Route::delete('delete', [MessageController::class, 'destroy'])
        ->name('delete')
        ->middleware('permission:admin.message.delete');

});

/**
 * End Worker Routes
 */


