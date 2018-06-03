<?php

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
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\LoginController@register');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'Auth\LoginController@details');
});

Route::get('/home', function(){
    return view('home');
});