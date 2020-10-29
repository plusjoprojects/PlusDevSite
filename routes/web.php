<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/custom',function() {
    return view('adminpanel');
    });
});


Route::group(['prefix' => 'numbers'],function () {
    Route::get('index','App\Http\Controllers\NumbersController@index');
    Route::post('indexWithFilter','App\Http\Controllers\NumbersController@indexWithFilter');
});

Route::group(['prefix' => 'approve'],function() {
    Route::post('store','App\Http\Controllers\ApprovesController@store');
});


Route::get('files/index','App\Http\Controllers\FilesController@index');
Route::post('files/indexWithProps','App\Http\Controllers\FilesController@indexWithProps');

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');