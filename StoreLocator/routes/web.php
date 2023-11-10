<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('dashboard')->group(function () {
    Route::get('/managepoints', function () {
        return view('dashboard.ManagePoints');
    });

     Route::get('/account-settings', function () {
        return view('dashboard.AccountSettings');
    });

    Route::get('/store-types', function () {
        return view('dashboard.StoreTypes');
    });

    Route::get('/tags', function () {
        return view('dashboard.Tags');
    });
});
