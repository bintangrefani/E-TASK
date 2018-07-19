<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:employee-api')->get('/employee', function (Request $request) {
//     return $request->employee();
// });


Route::prefix('user')->group(function(){
	Route::get('/', 'Api\UserController@users');
	Route::post('login', 'Api\UserController@login');
	Route::post('register', 'Api\UserController@register');
	Route::post('myclass', 'Api\UserController@myclasses');
	Route::post('class', 'Api\UserController@classes');
	Route::post('class2', 'Api\UserController@classes2');
	Route::post('enroll-class', 'Api\UserController@enrollClass');
});

Route::prefix('mentor')->group(function(){
	Route::get('/', 'Api\MentorController@mentors');
	Route::post('login', 'Api\MentorController@login');
	Route::post('register', 'Api\MentorController@register');
	Route::post('myclass', 'Api\MentorController@myclasses');
	Route::post('class', 'Api\MentorController@classes');
	Route::post('create-class', 'Api\MentorController@createClass');
});

Route::prefix('class')->group(function(){
	Route::get('/', 'Api\ClassController@all');
	// Route::get('{class_id}', 'Api\ClassController@classes');
	// Route::get('{user_id}', 'Api\ClassController@class-from-mentor');
});

Route::prefix('task')->group(function(){
	Route::post('/', 'Api\TaskController@tasks');
	Route::post('create-task', 'Api\TaskController@createTask');
});

Route::prefix('upload-file')->group(function(){
	Route::post('submit', 'Api\UploadFileController@submit');
	// Route::post('create-task', 'Api\TaskController@createTask');
});
// Route::post('user/register', 'Api\registerUserController@register');
// Route::post('user/login', 'Api\LoginUserController@login');

// Route::post('mentor/register', 'Api\registerMentorController@register');
// Route::post('mentor/login', 'Api\LoginMentorController@login');

// Route::get('users', 'Api\UserController@users');
// Route::get('employees', 'Api\EmployeeController@employees');
// Route::get('employees/profile', 'Api\EmployeeController@profile')->middleware('auth:api');
