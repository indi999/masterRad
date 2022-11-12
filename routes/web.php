<?php
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

//USERS
// Tasks
Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks');

// Task List
Route::group(['prefix'=>'jobs'], function(){
    Route::get('/', 'App\Http\Controllers\TaskController@index')->name('jobs.index'); // active tasks
    Route::get('/arhive', 'App\Http\Controllers\TaskController@arhive')->name('jobs.arhive'); // arhive tasks
    // Add Task
    Route::get('/create', 'App\Http\Controllers\TaskController@create')->name('jobs.create');
    Route::post('/store', 'App\Http\Controllers\TaskController@store')->name('jobs.store');
    // task update
    Route::get('/{job}/edit ', 'App\Http\Controllers\TaskController@edit')->name('jobs.edit');
    Route::patch('/{job} ', 'App\Http\Controllers\TaskController@update')->name('jobs.update');
    // task chackbox
    Route::patch('/{departmentTask}/late', 'App\Http\Controllers\TaskController@isLate')->name('jobs.late');
    Route::patch('/{departmentTask}/finish', 'App\Http\Controllers\TaskController@isFinish')->name('jobs.finish');
    Route::patch('/{task}/finishJob', 'App\Http\Controllers\TaskController@finishJob')->name('jobs.finishJob');
    // task delete
    Route::delete('/{task}', 'App\Http\Controllers\TaskController@destroy')->name('jobs.destroy');
});

// all users
Route::get('/employees', 'App\Http\Controllers\UserController@employees')->name('users.employees');
Route::get('/monitor','App\Http\Controllers\UserController@monitor')->name('users.monitor');
Route::get('/sellers','App\Http\Controllers\UserController@sellers')->name('users.sellers');

// show sektors
Route::get('/sektors/{sektor}', 'App\Http\Controllers\DepartmentController@show')->name('sektors.show');

// ADMIN ROUTES -------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->prefix('admin')->group(function(){
    // Dashboard
    Route::get('/', 'App\Http\Controllers\HomeController@dashboard')->name('admin.dashboard');

    //Tasks
    Route::get('/jobs/arhive', 'App\Http\Controllers\Admin\AdminTaskController@arhive')->name('admin.jobs.arhive'); // arhive tasks
    Route::patch('/jobs/{job}/finishJob', 'App\Http\Controllers\Admin\AdminTaskController@finishJob')->name('admin.jobs.finishJob');
    Route::patch('/jobs/{job}/update_expected_date_end', 'App\Http\Controllers\Admin\AdminTaskController@updateExpectedDateEnd')->name('admin.jobs.updateExpectedDateEnd');
    Route::resource('/jobs', 'App\Http\Controllers\Admin\AdminTaskController',[
        'as' => 'admin'
    ]);
    //Comments


    //Deparments
    Route::resource('/sektors', 'App\Http\Controllers\Admin\AdminDepartmentController',[
        'as' => 'admin'
    ])->except('create');
    // Users
    Route::get('/users/managers','App\Http\Controllers\Admin\AdminUsersController@managers')->name('admin.users.managers');
    Route::get('/users/employees','App\Http\Controllers\Admin\AdminUsersController@employees')->name('admin.users.employees');
    Route::get('/users/monitor','App\Http\Controllers\Admin\AdminUsersController@monitor')->name('admin.users.monitor');
    Route::get('/users/sellers','App\Http\Controllers\Admin\AdminUsersController@sellers')->name('admin.users.sellers');

    Route::patch('/users/{user}/status', 'App\Http\Controllers\Admin\AdminUsersController@status')->name('admin.users.status'); // blocked
    Route::resource('/users', 'App\Http\Controllers\Admin\AdminUsersController',[
        'as' => 'admin'
    ])->except('create');
});
