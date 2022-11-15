<?php
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

// Tasks Route for Users and managers
Route::resource('/tasks', 'App\Http\Controllers\TaskController');
Route::group(['prefix'=>'tasks'], function(){
    Route::patch('/{task}/update_expected_date_end', 'App\Http\Controllers\TaskController@updateExpectedDateEnd')->name('tasks.updateExpectedDateEnd');
    Route::get('/arhive', 'App\Http\Controllers\TaskController@arhive')->name('tasks.arhive'); // arhive tasks
    Route::patch('/{task}/finishJob', 'App\Http\Controllers\TaskController@finishJob')->name('task.finishJob');
    // Comments
    Route::post('/{task}/comment', 'App\Http\Controllers\CommentsController@store')->name('task.comment.store');

    // DepartmentTask chackbox
    Route::patch('/{departmentTask}/in_progress', 'App\Http\Controllers\TaskController@inProgress')->name('task.inProgress');
    Route::patch('/{departmentTask}/late', 'App\Http\Controllers\TaskController@isLate')->name('task.late');
    Route::patch('/{departmentTask}/finish', 'App\Http\Controllers\TaskController@isFinish')->name('task.finish');

});

// All users
Route::get('/employees', 'App\Http\Controllers\UserController@employees')->name('users.employees');
Route::get('/monitor','App\Http\Controllers\UserController@monitor')->name('users.monitor');
Route::get('/sellers','App\Http\Controllers\UserController@sellers')->name('users.sellers');
// Show sektors
Route::get('/sektors/{sektor}', 'App\Http\Controllers\DepartmentController@show')->name('sektors.show');

// ADMIN ROUTES -------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->prefix('admin')->group(function(){
    // Dashboard
    Route::get('/', 'App\Http\Controllers\HomeController@dashboard')->name('admin.dashboard');

    //Tasks
    Route::get('/jobs/arhive', 'App\Http\Controllers\Admin\AdminTaskController@arhive')->name('admin.jobs.arhive'); // arhive tasks
    Route::patch('/jobs/{job}/update_expected_date_end', 'App\Http\Controllers\Admin\AdminTaskController@updateExpectedDateEnd')->name('admin.jobs.updateExpectedDateEnd');
    Route::patch('/jobs/{job}/finishJob', 'App\Http\Controllers\Admin\AdminTaskController@finishJob')->name('admin.jobs.finishJob');
    Route::resource('/jobs', 'App\Http\Controllers\Admin\AdminTaskController',[
        'as' => 'admin'
    ]);
    //Checkbox Task DepartmentsTask
    Route::patch('/jobs/{departmentTask}/in_progress', 'App\Http\Controllers\Admin\AdminDepartmentTasksController@inProgress')->name('admin.jobs.inProgress');
    Route::patch('/jobs/{departmentTask}/late', 'App\Http\Controllers\Admin\AdminDepartmentTasksController@islate')->name('admin.jobs.isLate');
    Route::patch('/jobs/{departmentTask}/finish', 'App\Http\Controllers\Admin\AdminDepartmentTasksController@isFinish')->name('admin.jobs.isFinish');
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
