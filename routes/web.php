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

Route::get('challenge', 'ChallengeController@challenge');
Route::get('list', 'WorkController@list');
Route::get('infoo', 'WorkController@infoo');
Route::get('info/{id}', 'WorkController@info');
Route::get('detail/{id}', 'WorkController@detail');
// Route::get('challenge', 'WorkController@index');

Route::post('upload', 'FileController@upload');
Route::get('delete/{name}', 'FileController@deleteFile');
Route::get('delete2/{name}', 'FileController@deleteFile2'); // homework
Route::get('delete3/{name}', 'FileController@deleteFile3');
Route::get('download/{file}', 'FileController@download');
Route::get('download2/{file}', 'FileController@download2'); // homework
Route::get('download22/{file}', 'FileController@download22');
Route::post('update/{id}', 'WorkController@update');
Route::get('deleteById/{id}', 'WorkController@deleteById');
Route::get('homework', 'WorkController@homework');
Route::post('uploadHomeWork', 'FileController@uploadHomeWork');
Route::post('submit/{id}', 'WorkController@submit'); // homework

Route::post('send/{idSend}/{idReceive}' , 'WorkController@send');
Route::get('message', 'WorkController@message');
Route::get('deleteMess/{id}', 'WorkController@deleteMess');
Route::get('deleteChallenge/{id}', 'ChallengeController@deleteChallenge');
Route::post('create', 'ChallengeController@create');
Route::post('submitChallenge/{id}', 'ChallengeController@submitChallenge');

?>