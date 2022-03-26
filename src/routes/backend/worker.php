<?php
use Tabuna\Breadcrumbs\Trail;

use App\Domains\Worker\Models\Worker;
use App\Domains\Worker\Models\WorkerHelp;
use App\Domains\Worker\Http\Controllers\Backend\SpecialController;
use App\Domains\Worker\Http\Controllers\Backend\WorkerHelpController;


/**
 * Worker Routes
 */
Route::group([
    'prefix' => 'worker',
    'as' => 'worker.'
], function () {
    Route::get('create', [SpecialController::class, 'create'])
        ->name('create')
        ->middleware('permission:admin.worker.store')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.worker.index')
                ->push(__('Create Worker'), route('admin.worker.create'));
        });

    Route::post('store', [SpecialController::class, 'store'])
        ->name('store')
        ->middleware('permission:admin.worker.store');

    Route::group(['prefix' => '{worker}'], function () {
        Route::get('edit', [SpecialController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:admin.worker.update')
            ->breadcrumbs(function (Trail $trail, Worker $worker) {
                $trail->parent('admin.worker.index', $worker)
                    ->push(__('Editing :entity', ['entity' => __('Worker')]), route('admin.worker.edit', $worker));
            });

        Route::patch('/', [SpecialController::class, 'update'])
            ->name('update')
            ->middleware('permission:admin.worker.update');

        Route::delete('delete', [SpecialController::class, 'destroy'])
            ->name('delete')
            ->middleware('permission:admin.worker.delete');
    });

    Route::get('/', [SpecialController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.worker.list|admin.worker.store|admin.worker.update|admin.worker.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Worker Management'), route('admin.worker.index'));
        });
});
/**
 * End Worker Routes
 */
/**
 * Merchant Branch Routes
 */
/**
 * Worker Routes
 */
Route::group([
    'prefix' => 'workerHelp',
    'as' => 'workerHelp.'
], function () {
    Route::get('create', [WorkerHelpController::class, 'create'])
        ->name('create')
        ->middleware('permission:admin.workerHelp.store')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.workerHelp.index')
                ->push(__('Create Worker Help'), route('admin.workerHelp.create'));
        });

    Route::post('store', [WorkerHelpController::class, 'store'])
        ->name('store')
        ->middleware('permission:admin.workerHelp.store');

    Route::group(['prefix' => '{workerHelp}'], function () {
        Route::get('edit', [WorkerHelpController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:admin.workerHelp.update')
            ->breadcrumbs(function (Trail $trail, WorkerHelp $workerHelp) {
                $trail->parent('admin.workerHelp.index', $workerHelp)
                    ->push(__('Editing :entity', ['entity' => __('WorkerHelp')]), route('admin.workerHelp.edit', $workerHelp));
            });

        Route::patch('/', [WorkerHelpController::class, 'update'])
            ->name('update')
            ->middleware('permission:admin.workerHelp.update');

        Route::delete('delete', [WorkerHelpController::class, 'destroy'])
            ->name('delete')
            ->middleware('permission:admin.workerHelp.delete');
    });

    Route::get('/', [WorkerHelpController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.workerHelp.list|admin.workerHelp.store|admin.workerHelp.update|admin.workerHelp.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Worker Help Management'), route('admin.workerHelp.index'));
        });
});
/**
 * End WorkerHelp Routes
 */


