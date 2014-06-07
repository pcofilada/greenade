<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'admin','before'=>'admin'), function()
{
	Route::get('/','AdminController@index');
});

Route::post('signup','HomeController@doSignup');
Route::post('login','HomeController@doLogin');
Route::get('logout', function(){
	Session::flush();
	return Redirect::to('/');
});
Route::get('admin/login',function(){
	if(Session::has('admin')){
		return Redirect::to('admin');
	}else{
		$action = 'showLogin'; 
        		return App::make('AdminController')->$action();
	}
});
Route::post('admin/login','AdminController@doLogin');
Route::get('/', 'HomeController@home');

Route::get('admin-create', function(){
	$admin 		= new Admin;
	$admin->email 	= 'agentp@gorated.ph';
	$admin->password 	= Hash::make('admin');
	$admin->save();

	return "Save";
});