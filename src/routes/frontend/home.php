<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;
use App\Domains\Worker\Http\Controllers\Frontend\WorkerController;
use App\Domains\Lookups\Http\Controllers\Frontend\CategoryController;
use App\Domains\Lookups\Http\Controllers\Frontend\PageController;
use App\Domains\Worker\Models\Worker;
use App\Domains\Lookups\Http\Controllers\Frontend\SearchController;
use App\Domains\Message\Http\Controllers\Backend\MessageController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('/join_as_worker', [WorkerController::class, 'index'])
    ->name('join_as_worker')
    ->breadcrumbs(function (Trail $trail) {
//        $trail->push(__('Home'), route('frontend.index'));
    });
Route::post('store', [WorkerController::class, 'store'])
    ->name('store');

Route::get('/explore', [CategoryController::class, 'index'])
    ->name('category')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.category'));
    });

Route::get('/about', [PageController::class, 'indexAbout'])
    ->name('about')
    ->breadcrumbs(function (Trail $trail) {
         route('frontend.about');
    });


Route::get('/workers', [WorkerController::class, 'index'])
    ->name('workers')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });


Route::get('/contact', [PageController::class, 'indexContact'])
    ->name('contact')
    ->breadcrumbs(function (Trail $trail) {
        route('frontend.contact');
    });



Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });


Route::group(['prefix' => '{worker}'], function () {
    Route::get('show', [WorkerController::class, 'edit'])
        ->name('show');
});
Route::get('singlecategory/{id}', [CategoryController::class, 'show'])->name('single_category');
Route::get('categories', [CategoryController::class, 'showCategories'])->name('categories');


Route::get('singleworker/{id}', [WorkerController::class, 'show'])->name('single_worker');
Route::get('/search/', [SearchController::class,'search'])->name('search');


Route::get('create', [MessageController::class, 'create'])
    ->name('messageCreate')
    ->middleware('permission:admin.worker.store')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('admin.message.index')
            ->push(__('Create Message'), route('admin.message.create'));
    });

Route::post('messageStore', [MessageController::class, 'store'])
    ->name('messageStore');
