<?php

use Illuminate\Support\Facades\Route;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

//USERS


// Tasks
Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks');


    // Task List
    //Route::get('/jobs', 'App\Http\Controllers\TaskController@index')->name('jobs.index'); // active tasks
    Route::get('/jobs/arhive', 'App\Http\Controllers\TaskController@arhive')->name('jobs.arhive'); // arhive tasks
    // Add Task
    Route::get('/jobs/create', 'App\Http\Controllers\TaskController@create')->name('jobs.create');
    Route::post('/jobs/store', 'App\Http\Controllers\TaskController@store')->name('jobs.store');
    // task update
    Route::patch('/jobs/{jobs} ', 'App\Http\Controllers\TaskController@update')->name('jobs.update');
    // task chackbox
    Route::patch('/jobs/{departmentTask}/late', 'App\Http\Controllers\TaskController@isLate')->name('jobs.late');
    Route::patch('/jobs/{departmentTask}/finish', 'App\Http\Controllers\TaskController@isFinish')->name('jobs.finish');
    // task delete

    // all users
    Route::get('/employees', 'App\Http\Controllers\UserController@employees')->name('users.employees');
    // show sektors
    Route::get('/sektors/{sektor}', 'App\Http\Controllers\DepartmentController@show')->name('sektors.show');



// ADMIN ROUTES -------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->prefix('admin')->group(function(){

    // Dashboard
    Route::get('/', 'App\Http\Controllers\HomeController@dashboard')->name('admin.dashboard');

    //Tasks
    Route::resource('/jobs', 'App\Http\Controllers\Admin\AdminTaskController',[
        'as' => 'admin'
    ])->except('create');

    //Deparments
    Route::resource('/sektors', 'App\Http\Controllers\Admin\AdminDepartmentController',[
        'as' => 'admin'
    ])->except('create');

    // Users
    Route::get('/users/employees','App\Http\Controllers\Admin\AdminUsersController@employees')->name('admin.users.employees');
    Route::get('/users/managers','App\Http\Controllers\Admin\AdminUsersController@managers')->name('admin.users.managers');
    Route::patch('/users/{user}/status', 'App\Http\Controllers\Admin\AdminUsersController@status')->name('admin.users.status'); // blocked
    Route::resource('/users', 'App\Http\Controllers\Admin\AdminUsersController',[
        'as' => 'admin'
    ])->except('create');

});
