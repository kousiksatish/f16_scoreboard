<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/getScoreBoard', function () {

// 	$score[0] = array("rank"=>1, "college" => "NIT", "points" => 200.50);
// 	$score[1] = array("rank"=>2, "college" => "VIT", "points" => 300.25);
// 	$score[2] = array("rank"=>3, "college" => "IIT", "points" => 400.00);
// 	$response = array("status"=>200, "data"=>$score);
// 	return response()->json($response);
// });

Route::get('/', 'scoreBoardController@displayScore');

Route::get('/admin', 'adminLoginController@login');
Route::get('/admin/logout', 'adminLoginController@logout');
Route::post('/admin/auth', 'adminLoginController@auth');

Route::group(['middleware' => 'adminauth'], function () {

	// Route::group(['middleware' => 'adminauth'], function () {
	Route::get('/admin/dashboard', 'scoreBoardController@dashboard');

	Route::get('/admin/update', 'scoreBoardController@displayForm');
	Route::get('/admin/logs', 'scoreBoardController@logs');
	Route::post('/admin/updateScore', 'scoreBoardController@updateScore');
});



?>