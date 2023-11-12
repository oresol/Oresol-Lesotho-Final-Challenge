<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreTypesController;

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

Auth::routes();

Route::resource('tags',TagsController::class);
Route::resource('companies', CompanyController::class);
Route::resource('storetypes',StoreTypesController::class);
Route::resource('stores',StoreController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->group(function () {

    Route::get('/addtaggs', function () {
        return view('dashboard.tags.AddTaggs');
        });

    Route::get('/tags', function () {
            return view('dashboard.tags.Tags'); 
    });

    Route::get('/managepoints', function () {
        return view('dashboard.Stores.ManagePoints');
    });

    Route::get('/addstores', function () {
        return view('dashboard.Stores.AddStore');
    });

     Route::get('/account-settings', function () {
        return view('dashboard.Account.AccountSettings');
    });

    Route::get('/store-types', function () {
        return view('dashboard.StoreTypes.StoreTypes');
    });


    Route::get('/add-store-stype', function () {
        return view('dashboard.StoreTypes.AddTypes'); 
    });
  
});
  