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
Route::get("/", "IndexController@index");
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('/', 'Auth\LoginController@login')->name('login');
    Route::put('/', 'Auth\LoginController@logout')->name('register');
    Route::patch('/', 'Auth\LoginController@logout')->name('refresh');
    Route::delete('/', 'Auth\LoginController@logout')->name('logout');
});
