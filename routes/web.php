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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/order/{id}', [App\Http\Controllers\FrontendController::class, 'order'])->name('frontend.order');




Route::group(['prefix'=>'admin',['middleware'=>'auth','admin']],function(){
    Route::get('/item', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
    Route::post('/item/create', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}/edit', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    Route::get('/item/{id}/delete', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.delete');

    Route::get('/order/store', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::post('/order/store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::post('/order/{id}/check', [App\Http\Controllers\OrderController::class, 'check'])->name('order.check');

});

