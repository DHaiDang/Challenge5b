<?php

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', 'AuthController@dashboard'); 
Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration'); 
Route::get('dashboard', 'AuthController@dashboard'); 
Route::get('logout', 'AuthController@logout');
Route::get('users', 'UserController@index');

Route::get('challenge', 'WorkController@challenge');
Route::get('list', 'WorkController@list');
Route::get('infoo', 'WorkController@infoo');
Route::get('info/{id}', 'WorkController@info');
Route::get('detail/{id}', 'WorkController@detail');
// Route::get('challenge', 'WorkController@index');

Route::post('upload', 'WorkController@upload');
Route::get('delete/{name}', 'WorkController@deleteFile');
Route::get('delete2/{name}', 'WorkController@deleteFile2'); // homework
Route::get('download/{file}', 'WorkController@download');
Route::get('download2/{file}', 'WorkController@download2'); // homework
Route::post('update/{id}', 'WorkController@update');
Route::get('deleteById/{id}', 'WorkController@deleteById');
Route::get('homework', 'WorkController@homework');
Route::post('uploadHomeWork', 'WorkController@uploadHomeWork');

Route::get('submit/{file}', 'WorkController@submit'); // homework
?>