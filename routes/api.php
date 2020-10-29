<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'auth'],function() {
    Route::post('register','App\Http\Controllers\UserController@register');
    Route::post('login','App\Http\Controllers\UserController@login');
    Route::post('auth','App\Http\Controllers\UserController@auth');
});

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('index/{id}','App\Http\Controllers\DashboardController@index');
    Route::get('charts/{id}','App\Http\Controllers\DashboardController@charts');
    Route::get('indexWallet/{id}','App\Http\Controllers\DashboardController@indexWallet');
    Route::get('indexPayout/{id}','App\Http\Controllers\DashboardController@indexPayout');
    Route::get('indexSended/{id}','App\Http\Controllers\DashboardController@indexSended');
    Route::post('payout/store','App\Http\Controllers\PayoutController@store');
    Route::get('indexFiles/categories_id/{categories_id}/countries_id/{countries_id}');
    
});

Route::group(['prefix' => 'adminapis'],function() {
    Route::post('files/store','App\Http\Controllers\Admin\FilesController@store');  
});