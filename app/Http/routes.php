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
Route::get('/1','Test1Controller@index');
Route::get('/','HomeController@index');
Route::get('home','HomeController@index');
Route::group(['prefix'=>'test','middleware'=>'auth','namespace'=>'Test'],function(){
	Route::get('/','TestController@index');
	Route::post('/p',function(){ return "hello world";});
});
/*
Route::get('test',[
 'middleware'=>'auth',
 'uses'=>'TestController@index'
]);
*/

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');
/*
Route::controllers([
'auth'=>'Auth\AuthController',
]);
*/
Route::get('/test/1',['as'=>'academy',function(){
	return "1231";
}]);
Route::get('/test',function(){
	return redirect()->route('academy');
});

Route::get('/hello/laravelacademy/{id}',['as'=>'academy',function($id){
	return 'hello'.$id.'!';
}]);
Route::get('/testnamelaravel',function(){
	return redirect()->route('academy',['id'=>4]);
});
Route::group(['as'=>'admin'],function(){
	Route::get('dadasda',['as'=>'dadasda',function(){
		return '123131';
	}]);
});
Route::get('/testnameroute',function(){
	return route('admin::dadasda');
});
Route::group(['middleware'=>'test:male'],function(){
	Route::get('/write/person1',function(){
		
	});
	Route::get('/write/person2',function(){
		
	});
});
Route::get('/age/refuse',['as'=>'refuse',function(){
	return "未成年人禁止入内";
}]);

