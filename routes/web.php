<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        
        Auth::routes();
        // Auth::routes(['register' => false]);

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");
        Route::delete('locations/{id}','App\Http\Controllers\LocationController@destroy')->name('location.destroy');

        Route::resource('/locations', 'App\Http\Controllers\LocationController')->middleware("auth");
        Route::resource('/transaction', 'App\Http\Controllers\TransactionController')->middleware("auth");

        // Route::get('/locations', [App\Http\Controllers\LocationController::class, 'index']);

    });



