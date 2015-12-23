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
Route::get('/','HomeController@index');
Route::get('home','HomeController@index');

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

Route::group(['prefix'=>'test','namespace'=>'Test'],function(){
	Route::get('2','TestController@index');
	Route::get('1',function(){return '123';});
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	resource('/','PostController');
	resource('post','PostController');
	resource('set','SetController');
	resource('products','ProductController');
	resource('users','UsersController');
	resource('business','BusinessController');
});
