<?php

use App\User;
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

Route::get('/', function () {
	$users = User::all();
    return view('welcome', ['users' => $users]);
})->name("root");

Route::resource('students', 'StudentController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//student registration
Route::get('/student/registration', 'HomeController@studentRegistration')->name("studentRegistration");
Route::post('/student/registration', 'HomeController@saveStudent')->name("studentRegistration");
Route::get('/home/students', 'HomeController@students')->name("homeStudents");
Route::post('/home/student/sorting', 'HomeController@sorting')->name("sorting");

//not implimented
Route::get('/notImplimented', 'HomeController@notImplimented')->name("notImplimented");

//dashboard
Route::get('/admin/dashboard', 'CategoryController@dashboard')->name("dashboardAdmin");

//profile
Route::get('/student/profile/{id}', 'ProfileController@studentProfile')->name("studentProfile");

//tasks
Route::get('/tasks', 'TaskController@index')->name("tasks");
Route::get('/tasks/create', 'TaskController@create')->name("createTask");
Route::post('/tasks/save', 'TaskController@store')->name("saveTask");
Route::get('/tasks/show/{id}', 'TaskController@show')->name("showTask");
Route::get('/tasks/edit/{id}', 'TaskController@edit')->name("editTask");
Route::post('/tasks/update/{id}', 'TaskController@update')->name("updateTask");
Route::post('/tasks/delete/{id}', 'TaskController@destroy')->name("deleteTask");

//categories
Route::get('/categories', 'CategoryController@index')->name("categories");
Route::get('/categories/create', 'CategoryController@create')->name("createCategory");
Route::post('/categories/save', 'CategoryController@store')->name("saveCategory");
Route::get('/categories/show/{id}', 'CategoryController@show')->name("showCategory");
Route::get('/categories/edit/{id}', 'CategoryController@edit')->name("editCategory");
Route::post('/categories/update/{id}', 'CategoryController@update')->name("updateCategory");
Route::post('/categories/delete/{id}', 'CategoryController@destroy')->name("deleteCategory");

//tasks
Route::get('/employers', 'EmployerController@index')->name("employers");
Route::get('/employers/create', 'EmployerController@create')->name("createEmployer");
Route::post('/employers/save', 'EmployerController@store')->name("saveEmployer");
Route::get('/employers/show/{id}', 'EmployerController@show')->name("showEmployer");
Route::get('/employers/edit/{id}', 'EmployerController@edit')->name("editEmployer");
Route::post('/employers/update/{id}', 'EmployerController@update')->name("updateEmployer");
Route::post('/employers/delete/{id}', 'EmployerController@destroy')->name("deleteEmployer");


//employer's registration
Route::get('/employer/registration', 'HomeController@employerRegistration')->name("employerRegistration");
Route::post('/employer/registration', 'HomeController@saveEmployer')->name("employerRegistration");

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

//tasks
Route::get('/students', 'StudentController@index')->name("students");
Route::get('/tasks/create', 'TaskController@create')->name("createTask");
Route::post('/tasks/save', 'TaskController@store')->name("saveTask");
Route::get('/tasks/show/{id}', 'TaskController@show')->name("showTask");
Route::get('/tasks/edit/{id}', 'TaskController@edit')->name("editTask");
Route::post('/tasks/update/{id}', 'TaskController@update')->name("updateTask");
Route::post('/tasks/delete/{id}', 'TaskController@destroy')->name("deleteTask");

