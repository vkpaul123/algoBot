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
    return view('welcome');
});

//	robot routes


//	path routes
Route::get('/pathInputForm', 'PathController@showPathInputForm')->name('pathInputForm');
Route::post('/pathInputForm', 'PathController@storePath')->name('pathInputForm-store');
Route::get('/getPath/{robot_id}/get', 'PathController@getPath');
