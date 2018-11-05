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

// 后台
Route::resource('admin/login', 'Admin\LoginController');

Route::get('admin/index', 'Admin\IndexController@index');
Route::get('admin/top', 'Admin\IndexController@top');
Route::get('admin/left', 'Admin\IndexController@left');
Route::get('admin/main', 'Admin\IndexController@main');

Route::resource('admin/welcome', 'Admin\WelcomeController');
Route::resource('admin/school', 'Admin\SchoolController');
Route::resource('admin/grade', 'Admin\GradeController');
Route::resource('admin/student', 'Admin\StudentController');
Route::resource('admin/order', 'Admin\OrderController');
Route::resource('admin/goods', 'Admin\GoodsController');

//前台
Route::resource('login', 'Client\LoginController',
				 ['only'=>['create', 'store']]);
Route::resource('index', 'Client\IndexController');


Route::get('/', 'Client\LoginController@create');

