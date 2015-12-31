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

#Route::get('auth/login','Auth\AuthController@getLogin');
#Route::post('auth/login','Auth\AuthController@postLogin');
#Route::get('auth/logout','Auth\AuthController@getLogout');
#Route::get('auth/register','Auth\AuthController@getRegister');
#Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('auth/admin/login', 'Auth\AdminAuthController@getLogin');
Route::post('auth/admin/login','Auth\AdminAuthController@postLogin');
Route::get('auth/admin/logout', 'Auth\AdminAuthController@getLogout');

Route::group(['prefix'=>'test','namespace'=>'Test'],function(){
	Route::get('2','TestController@index');
	Route::get('1',function(){return '123';});
	Route::get('request','TestController@request');
	Route::get('method','TestController@method');
	Route::get('request/all','TestController@requestall');
	Route::get('request/cookie','TestController@cookie');
	Route::get('getpage','TestController@getpage');
	Route::get('create_class','TestController@create_2');
	Route::get('update','TestController@update_1');
	Route::get('delete','TestController@delete_1');
	Route::get('get_1','TestController@get_1');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::get('','HomeController@home');
});

Route::group(['prefix'=>'admin/goods','namespace'=>'Goods'],function(){
	Route:resource('goodsclass','GoodsClassAdminController');
});
