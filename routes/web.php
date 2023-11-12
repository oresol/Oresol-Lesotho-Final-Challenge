<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreTagController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


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

Route::get('/company-profile', function () {
    return view('pages.company');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(StoreController::class)->group(function() {
    Route::get('store-create', 'create')->name('store.create');
    Route::get('store-select', 'index')->name('store.index');
    Route::get('store-delete/{id}', 'delete')->name('store.delete');
    Route::delete('store-delete/{store}', 'destroy')->name('store.destroy');
    Route::get('store-edit/{id}', 'edit')->name('store.edit');
    Route::post('store-update/{store}', 'update')->name('store.update');
    Route::post('store', 'store')->name('stores.store');
    Route::get('get-stores', 'getstores');
    Route::get('get-stores/{id}', 'getstoresbytype')->name('storesbytype');
    Route::post('stores-read', 'readstores')->name('stores.read');
    Route::get('read-file', 'readfile')->name('file.read');
});

Route::resource('type', TypeController::class);
Route::resource('tags', TagController::class);

Route::controller(UserController::class)->group(function() {
    Route::get('change-password', 'edit')->name('changepassword');
    Route::post('update-password', 'update')->name('updatepassword');
    Route::get('user-profile', 'index')->name('userprofile');
});


Auth::routes();