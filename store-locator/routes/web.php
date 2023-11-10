<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController as TagController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/pages/addTags', function () {
    return view('admin.pages.addTags');
})->name('admin.pages.addTags');

Route::get('admin/pages/manageTags', function () {
    return view('admin.pages.manageTags');
})->name('admin.pages.manageTags');

Route::get('admin/pages/addCategories', function () {
    return view('admin.pages.addCategories');
})->name('admin.pages.addCategories');

Route::get('admin/pages/manageCategories', function () {
    return view('admin.pages.manageCategories');
})->name('admin.pages.manageCategories');

Route::get('admin/pages/manageProfile', function () {
    return view('admin.pages.manageProfile');
})->name('admin.pages.manageProfile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('tags', TagController::class);
Route::resource('categories', CategoryController::class);

 
