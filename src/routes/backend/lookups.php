<?php
use App\Domains\Lookups\Http\Controllers\Backend\CategoryController;
use App\Domains\Lookups\Http\Controllers\Backend\ProductController;
use App\Domains\Lookups\Http\Controllers\Backend\CityController;
use App\Domains\Lookups\Http\Controllers\Backend\PageController;
use Tabuna\Breadcrumbs\Trail;
use App\Domains\Lookups\Models\Category;
use App\Domains\Lookups\Models\Product;
use App\Domains\Lookups\Models\City;
use App\Domains\Lookups\Models\Page;

Route::group([
    'prefix' => 'lookups',
    'as' => 'lookups.',
    'middleware' => config('boilerplate.access.middleware.verified'),
], function (){
    /**
     * Category Routes
     */
    Route::group([
        'prefix' => 'category',
        'as' => 'category.'
    ], function (){
        Route::get('/', [CategoryController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.lookups.category.list|admin.lookups.category.store|admin.lookups.category.update|admin.lookups.category.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Category Management'), route('admin.lookups.category.index'));
            });

        Route::get('create', [CategoryController::class, 'create'])
            ->name('create')
            ->middleware('permission:admin.lookups.category.store')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.lookups.category.index')
                    ->push(__('Create Category'), route('admin.lookups.category.create'));
            });

        Route::post('store', [CategoryController::class, 'store'])
            ->name('store')
            ->middleware('permission:admin.lookups.category.store');

        Route::group(['prefix' => '{category}'], function () {
            Route::get('edit', [CategoryController::class, 'edit'])
                ->name('edit')
                ->middleware('permission:admin.lookups.category.update')
                ->breadcrumbs(function (Trail $trail, Category $category) {
                    $trail->parent('admin.lookups.category.index', $category)
                        ->push(__('Editing :entity', ['entity' => __('Category')]), route('admin.lookups.category.edit', $category));
                });

            Route::patch('/', [CategoryController::class, 'update'])
                ->name('update')
                ->middleware('permission:admin.lookups.category.update');

            Route::delete('delete', [CategoryController::class, 'destroy'])
                ->name('delete')
                ->middleware('permission:admin.lookups.category.delete');
        });

    });

        Route::group([
            'prefix' => 'product',
            'as' => 'product.'
        ], function (){
            Route::get('/', [ProductController::class, 'index'])
                ->name('index')
                ->middleware('permission:admin.lookups.product.list|admin.lookups.product.store|admin.lookups.product.update|admin.lookups.product.delete')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('Product Management'), route('admin.lookups.product.index'));
                });

            Route::get('create', [ProductController::class, 'create'])
                ->name('create')
                ->middleware('permission:admin.lookups.product.store')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.lookups.product.index')
                        ->push(__('Create Product'), route('admin.lookups.product.create'));
                });

            Route::post('store', [ProductController::class, 'store'])
                ->name('store')
                ->middleware('permission:admin.lookups.product.store');

            Route::group(['prefix' => '{product}'], function () {
                Route::get('edit', [ProductController::class, 'edit'])
                    ->name('edit')
                    ->middleware('permission:admin.lookups.product.update')
                    ->breadcrumbs(function (Trail $trail, Product $product) {
                        $trail->parent('admin.lookups.product.index', $product)
                            ->push(__('Editing :entity', ['entity' => __('Product')]), route('admin.lookups.product.edit', $product));
                    });

                Route::patch('/', [ProductController::class, 'update'])
                    ->name('update')
                    ->middleware('permission:admin.lookups.product.update');

                Route::delete('delete', [ProductController::class, 'destroy'])
                    ->name('delete')
                    ->middleware('permission:admin.lookups.product.delete');
            });

        });

                Route::group([
                    'prefix' => 'city',
                    'as' => 'city.'
                ], function () {
                    Route::get('/', [CityController::class, 'index'])
                        ->name('index')
                        ->middleware('permission:admin.lookups.city.list|admin.lookups.city.store|admin.lookups.city.update|admin.lookups.city.delete')
                        ->breadcrumbs(function (Trail $trail) {
                            $trail->parent('admin.dashboard')
                                ->push(__('City Management'), route('admin.lookups.city.index'));
                        });

                    Route::get('create', [CityController::class, 'create'])
                        ->name('create')
                        ->middleware('permission:admin.lookups.city.store')
                        ->breadcrumbs(function (Trail $trail) {
                            $trail->parent('admin.lookups.city.index')
                                ->push(__('Create City'), route('admin.lookups.city.create'));
                        });

                    Route::post('store', [CityController::class, 'store'])
                        ->name('store')
                        ->middleware('permission:admin.lookups.city.store');

                    Route::group(['prefix' => '{city}'], function () {
                        Route::get('edit', [CityController::class, 'edit'])
                            ->name('edit')
                            ->middleware('permission:admin.lookups.city.update')
                            ->breadcrumbs(function (Trail $trail, City $city) {
                                $trail->parent('admin.lookups.city.index', $city)
                                    ->push(__('Editing :entity', ['entity' => __('City')]), route('admin.lookups.city.edit', $city));
                            });

                        Route::patch('/', [CityController::class, 'update'])
                            ->name('update')
                            ->middleware('permission:admin.lookups.city.update');

                        Route::delete('delete', [CityController::class, 'destroy'])
                            ->name('delete')
                            ->middleware('permission:admin.lookups.city.delete');
                    });
                });


                 Route::group([
                     'prefix' => 'page',
                     'as' => 'page.'
                 ], function (){
                     Route::get('/', [PageController::class, 'index'])
                         ->name('index')
                         ->middleware('permission:admin.lookups.page.list|admin.lookups.page.store|admin.lookups.page.update|admin.lookups.page.delete')
                         ->breadcrumbs(function (Trail $trail) {
                             $trail->parent('admin.dashboard')
                                 ->push(__('Page Management'), route('admin.lookups.page.index'));
                         });

                     Route::get('create', [PageController::class, 'create'])
                         ->name('create')
                         ->middleware('permission:admin.lookups.page.store')
                         ->breadcrumbs(function (Trail $trail) {
                             $trail->parent('admin.lookups.page.index')
                                 ->push(__('Create Page'), route('admin.lookups.page.create'));
                         });

                     Route::post('store', [PageController::class, 'store'])
                         ->name('store')
                         ->middleware('permission:admin.lookups.page.store');

                     Route::group(['prefix' => '{page}'], function () {
                         Route::get('edit', [PageController::class, 'edit'])
                             ->name('edit')
                             ->middleware('permission:admin.lookups.page.update')
                             ->breadcrumbs(function (Trail $trail, Page $page) {
                                 $trail->parent('admin.lookups.page.index', $page)
                                     ->push(__('Editing :entity', ['entity' => __('Page')]), route('admin.lookups.page.edit', $page));
                             });

                         Route::patch('/', [PageController::class, 'update'])
                             ->name('update')
                             ->middleware('permission:admin.lookups.page.update');

                         Route::delete('delete', [PageController::class, 'destroy'])
                             ->name('delete')
                             ->middleware('permission:admin.lookups.page.delete');
                     });

                 }


    );
    /**
     * End Lookups Routes
     */


});
