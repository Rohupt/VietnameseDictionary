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

Route::prefix('account')->group(function() {
    Route::get('/', 'AccountController@index');

    Route::get('/register', 'AccountController@register')->name('register');
    Route::post('/register', 'AccountController@storeUser');

    Route::get('/login', 'AccountController@login')->name('login');
    Route::post('/login', 'AccountController@authenticate');

    Route::get('/userProfile', 'AccountController@userProfile')->name('userProfile');
    Route::post('/userProfile', 'AccountController@storeUserProfile');

    Route::get('logout', 'AccountController@logout')->name('logout');

});
