<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\CustomerController;
use App\Http\Controllers\Management\ReferencesController;
use App\Http\Controllers\Management\DevicesController;
use App\Http\Controllers\Management\ProfileController;

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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    return 'Application cache cleared';
});
Route::fallback(function () {
    return view("404");
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('reference', ReferencesController::class);
    Route::resource('device', DevicesController::class);
    Route::resource('profile', ProfileController::class);
    Route::get('password', [ProfileController::class, 'password']);
    Route::put('password/{id}', [ProfileController::class, 'updatePassword'])->name('profile.password');

});



