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

Route::get('/item', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
Route::post('/item/create', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
Route::get('/item/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
Route::put('/item/{id}/edit', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
Route::get('/item/{id}/delete', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.delete');

