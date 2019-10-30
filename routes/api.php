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
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/user', 'Auth\LoginController@me')->name('user');
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    Route::patch('/', 'Auth\LoginController@logout')->name('refresh');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::apiResource('users', 'UserController')
    ->except(['store', 'index'])
    ->middleware('auth:api');

Route::group(['prefix' => 'email', 'as' => 'verification.'], function () {
    Route::get('verify/{user}/{hash}', 'Auth\VerificationController@verify')->name('verify');
});

// \Illuminate\Support\Facades\Auth::routes(['verify' => true]);
