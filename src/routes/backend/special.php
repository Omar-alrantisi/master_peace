<?php
use Tabuna\Breadcrumbs\Trail;

use App\Domains\Special\Models\Special;

use App\Domains\Special\Http\Controllers\Backend\SpecialController;



/**
 * Worker Routes
 */
Route::group([
    'prefix' => 'special',
    'as' => 'special.'
], function () {
    Route::get('create', [SpecialController::class, 'create'])
        ->name('create')
        ->middleware('permission:admin.special.store')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.special.index')
                ->push(__('Create Special Worker'), route('admin.special.create'));
        });

    Route::post('store', [SpecialController::class, 'storeS'])
        ->name('store')
        ->middleware('permission:admin.special.store');

    Route::group(['prefix' => '{special}'], function () {
        Route::get('edit', [specialController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:admin.special.update')
            ->breadcrumbs(function (Trail $trail, Special $special) {
                $trail->parent('admin.special.index', $special)
                    ->push(__('Editing :entity', ['entity' => __('Special')]), route('admin.special.edit', $special));
            });

        Route::patch('/', [SpecialController::class, 'update'])
            ->name('update')
            ->middleware('permission:admin.special.update');

        Route::delete('delete', [SpecialController::class, 'destroy'])
            ->name('delete')
            ->middleware('permission:admin.special.delete');
    });

    Route::get('/', [SpecialController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.special.list|admin.special.store|admin.special.update|admin.special.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Special Management'), route('admin.special.index'));
        });
});
/**
 * End Worker Routes
 */

