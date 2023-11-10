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


// Route::get('/', function () {
//     return view('pages.home');
// });


Route::get('/company-profile', function () {
    return view('pages.company');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/store-create', [StoreController::class, 'create'])->name('storecreate');
Route::get('/store-select', [StoreController::class, 'index'])->name('getstores');
Route::get('/store-delete/{id}', [StoreController::class, 'delete'])->name('storedeleteget');
Route::delete('/store-delete/{store}', [StoreController::class, 'destroy'])->name('storedelete');
Route::get('/store-edit/{id}', [StoreController::class, 'edit'])->name('storeedit');
Route::post('/store-update/{store}', [StoreController::class, 'update'])->name('storeupdate');
Route::post('/store', [StoreController::class, 'store'])->name('store');
Route::get('/getStore', [StoreController::class, 'getStores']);
Route::get('/get-stores/{id}', [StoreController::class, 'getStoresByType'])->name('storesbytype');
// Route::get('/search-stores', [StoreController::class, 'storesAddress'])->name('storesbyaddress');
// Route::get('/search-stores/{address}', [StoreController::class, 'getStoresAddress'])->name('gtstoresbyaddress');


Route::get('/manage-type', [TypeController::class, 'index'])->name('managetype');
Route::delete('/type-delete/{type}', [TypeController::class, 'destroy'])->name('typedelete');
Route::post('/type-update/{type}', [TypeController::class, 'update'])->name('typeupdate');
Route::post('/type-store', [TypeController::class, 'store'])->name('typestore');


Route::get('/manage-tags', [TagController::class, 'index'])->name('managetags');
Route::delete('/tag-delete/{tag}', [TagController::class, 'destroy'])->name('tagdelete');
Route::post('/tag-store', [TagController::class, 'store'])->name('tagstore');
Route::post('/tag-update/{tag}', [TagController::class, 'update'])->name('tagupdate');

Route::get('/change-password', [UserController::class, 'edit'])->name('changepassword');
Route::post('/update-password', [UserController::class, 'update_password'])->name('updatepassword');
Route::get('/user-profile', [UserController::class, 'index'])->name('userprofile');


Auth::routes();