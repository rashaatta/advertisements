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


Route::group(['prefix' => 'advertisements'], function () {
    Route::get('/', ['uses' => 'App\Http\Controllers\AdvertisementController@index'])->name('advertisement.index');
    Route::get('create', ['uses' => 'App\Http\Controllers\AdvertisementController@create'])->name('advertisement.create');
    Route::get('edit/{id}', ['uses' => 'App\Http\Controllers\AdvertisementController@edit'])->name('advertisement.edit');
    Route::get('/{id}', ['uses' => 'App\Http\Controllers\AdvertisementController@show'])->name('advertisement.show');
    Route::post('/', ['uses' => 'App\Http\Controllers\AdvertisementController@store'])->name('advertisement.store');
    Route::post('/{id}', ['uses' => 'App\Http\Controllers\AdvertisementController@update'])->name('advertisement.update');
    Route::delete('image/{id}', ['uses' => 'App\Http\Controllers\AdvertisementController@delete'])->name('advertisement.image.delete');
    Route::delete('/{id}', ['uses' => 'App\Http\Controllers\AdvertisementController@destroy'])->name('advertisement.delete');
});
