<?php
use App\Models\User;
use App\Models\Kelas;
use App\Models\Resident;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Backend\BackendController@actionIndex')->middleware('verify-login');
Route::get('login', 'Backend\LoginController@actionIndex');
Route::get('logout', 'Backend\LoginController@actionLogout')->middleware('revalidate');
Route::post('validate-login', 'Backend\LoginController@actionLogin');

Route::resource('mentor', 'Backend\MentorController')->middleware('verify-login');
Route::resource('user', 'Backend\UserController')->middleware('verify-login');
Route::resource('class', 'Backend\ClassController')->middleware('verify-login');
Route::resource('task', 'Backend\TaskController')->middleware('verify-login');

// Route::post('class/add', 'Backend\ClassController@add');

// Route::get('form/upload-file', function () {
//     return view('form.upload_file');
// })->middleware('verify-login');

Route::get('form/mentor', function () {
    return view('mentor.form');
})->middleware('verify-login');

Route::get('form/class', function () {
	$data = User::where(['role'=>1])->get();
    return view('class.form', compact('data'));
})->middleware('verify-login');

Route::get('form/user', function () {
    return view('user.form');
})->middleware('verify-login');

Route::get('form/task', function () {
	$data = Kelas::all();
    return view('task.form', compact('data'));
})->middleware('verify-login');

Route::group(['prefix' => 'class', 'middleware' => 'verify-login'], function(){
	Route::get('add/{id}', 'Backend\ClassController@add');
	Route::post('save', 'Backend\ClassController@save');
	Route::get('delete/{id}', 'Backend\ClassController@deleteUser');
});

Route::group(['prefix' => 'task', 'middleware' => 'verify-login'], function(){
	Route::get('add/{id}', 'Backend\TaskController@add');
	Route::post('save', 'Backend\TaskController@save');
	Route::get('list/{id}', 'Backend\TaskController@list');
});




// Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'middleware' => 'verify-login'], function () {
// 	Route::get('/', 'BackendController@actionIndex');

// 	Route::group(['prefix' => 'fuzzy', 'namespace' => 'Fuzzy'], function () 
// 	{
// 	    Route::get('/', 'FuzzyController@index');
// 	    Route::post('/proses', 'FuzzyController@process');
// 	});
// });


Route::get('user-home', 'Backend\BackendController@actionIndexUser')->middleware('verify-login');
Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'middleware' => 'verify-login'], function () {
    Route::get('user-home', 'BackendController@actionIndexUser');
	Route::resource('userclass', 'User\ClassController');
    Route::get('detail/{id}', 'User\ClassController@detail');
});


Route::get('mentor-home', 'Backend\BackendController@actionIndexMentor')->middleware('verify-login');
// Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'middleware' => 'verify-login'], function () {
//     Route::get('mentor-home', 'BackendController@actionIndexMentor');
// 	Route::resource('mentorclass', 'Mentor\ClassController');
//     Route::get('detail/{id}', 'Mentor\ClassController@detail');
// });
