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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('auth/login', ['as'=>'login_get','uses' => 'Auth\AuthController@getLogin']);

Route::post('auth/login', ['as'=>'login_post','uses' => 'Auth\AuthController@postLogin']);

Route::get('auth/logout', ['as'=>'logout_get','uses' => 'Auth\AuthController@getLogout']);

Route::post('auth/register', ['as'=>'register_post','uses' => 'Auth\AuthController@postRegister']);

Route::post('reset-password', 'Auth\AuthController@sendMailReset');

Route::get('/mat-khau/dat-lai/{token}', 'Auth\AuthController@getReset');
Route::post('/mat-khau/dat-lai/{token}', 'Auth\AuthController@postReset');

Route::get('notify-sucess', function(){
	return view('notify.sucess');
});

Route::get('notify-error', function(){
	return view('notify.error');
});


Route::get('index.html', function(){
	if(Auth::guest()){
		return view('index');
	}else{
		return Redirect::to('home');
	}
});

Route::get('home', function(){
	if(Auth::user()->role == 1){
		return view('index');
	}else{
		return Redirect::to('admin');
	}
});

Route::get('admin', function(){
	return view('admins.index');
});

Route::get('admin/vien-tham', function(){
	return view('admins.vientham');
});

Route::get('admin/khi-tuong', function(){
	return view('admins.khituong');
});

Route::get('admin/vai-tro', function(){
	return view('admins.vaitro');
});

Route::get('admin/quyen-han', function(){
	return view('admins.quyenhan');
});

Route::get('admin/nguoi-dung', function(){
	return view('admins.nguoidung');
});

Route::get('admin/don-hang-yeu-cau', function(){
	return view('admins.donhangyeucau');
});