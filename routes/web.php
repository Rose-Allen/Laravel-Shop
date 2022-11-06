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
//
//    Route::prefix('category')->group(function (){
//        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
//        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
//        Route::post('/', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
//    });

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->prefix('category')->group(function () {
        Route::get('/', 'index')->name('admin.category.index');
        Route::get('create', 'create')->name('admin.category.create');
        Route::post('/', 'store')->name('admin.category.store');
        Route::get('/{category}/edit', 'edit')->name('admin.category.edit');
        Route::patch('{category}', 'update')->name('admin.category.update');

    });
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('admin.brand.index');


});
