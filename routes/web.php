<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->prefix('category')->group(function () {
        Route::get('/', 'index')->name('admin.category.index');
        Route::get('create', 'create')->name('admin.category.create');
        Route::post('/', 'store')->name('admin.category.store');
        Route::get('/{category}/edit', 'edit')->name('admin.category.edit');
        Route::patch('{category}', 'update')->name('admin.category.update');

    });
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('admin.brand.index');

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->prefix('product')->group(function () {
        Route::get('/', 'index')->name('admin.product.index');
        Route::get('create', 'create')->name('admin.product.create');
        Route::post('/', 'store')->name('admin.product.store');
        Route::get('/{product}/edit', 'edit')->name('admin.product.edit');
        Route::patch('/{product}', 'update')->name('admin.product.update');
        Route::get('/{product}', 'destroy')->name('admin.product.delete');
        Route::get('product-image/{productImage}/delete', 'destroyImage')->name('admin.product.destroyImage');

        Route::post('/product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->prefix('color')->group(function (){
        Route::get('/', 'index')->name('admin.color.index');
        Route::get('/create', 'create')->name('admin.color.create');
        Route::post('/', 'store')->name('admin.color.store');
        Route::get('/{color}/edit', 'edit')->name('admin.color.edit');
        Route::patch('/{color}', 'update')->name('admin.color.update');
        Route::get('/{color}', 'destroy')->name('admin.color.delete');
    });



});
