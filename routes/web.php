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

Auth::routes();

Route::get('/logout', function() {
    Auth::logout();
    Session::flush();

    return Redirect::back();
});

Route::get('/', 'HomeController@index');

// Women
Route::get('/women', 'WomanController@index');
Route::get('/women/{id}', 'WomanController@show');
Route::get('/women/{id}/delete', 'WomanController@destroy');
Route::post('/women', 'WomanController@store');

// Track Records
Route::get('/track-records', 'TrackRecordController@index');
Route::get('/track-records/{id}', 'TrackRecordController@show');
