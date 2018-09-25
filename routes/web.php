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
Route::get('/robot', 'RobotController@showNewRobotTraversalForm')->name('newRobotTraversal');
Route::post('/robot', 'RobotController@saveNewRobotTraversalForm')->name('saveNewRobotTraversal');
Route::get('/robot/{id}/viewRobotTraversal', 'RobotController@viewRobotTraversal')->name('viewRobotTraversal');

//	test Connection
Route::get('/testConnection', 'PathController@testConnection');

//	robot movements
Route::get('/robot/setAllowMovement/{id}/start', 'RobotController@startRobotMovement')->name('startRobotMovement');
Route::get('/robot/setAllowMovement/{id}/pause', 'RobotController@pauseRobotMovement')->name('pauseRobotMovement');
Route::get('/robot/setAllowMovement/{id}/stop', 'RobotController@stopRobotMovement')->name('stopRobotMovement');

Route::get('/robot/getAllowMovement/{id}', 'RobotController@getRobotAllowMoveStatus');

// robot reporting(sending requests) to server
Route::get('/robot/updateMove/{robot_id}/{currLocX}/{currLocY}/{orientation}/{command}/{nodeType}', 'RobotMoveUpdateController@addNewStep');
Route::get('/robot/updateObstacle/{robot_id}/{xLocation}/{yLocation}/{obstacleType}', 'RobotMoveUpdateController@addNewObstacle');

// Ajax loader
Route::get('/ajax/traversal/loader/{id}', 'RobotController@refreshRobotTraversal')->name('loadTraversalThrough');

//	path routes
Route::get('/pathInputForm/{robot_id}', 'PathController@showPathInputForm')->name('pathInputForm');
Route::post('/pathInputForm', 'PathController@storePath')->name('pathInputForm-store');
Route::post('/pathInputForm', 'PathController@storePathReroute')->name('pathInputForm-reroute');
Route::get('/getPath/{robot_id}/get', 'PathController@getPath');
Route::get('/getLatestPath/{robot_id}/get', 'PathController@getLatestPath');
Route::get('/initRobotData/{robot_id}/get', 'RobotController@initRobotData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
