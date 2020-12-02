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

//Route::get('/', 'App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//USERS


// Tasks
Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks');
    // Managers -----------------------------------------------------------------------------------------------------
    Route::prefix('manager')->group(function(){
        // Add Task
        Route::get('/add_job', 'App\Http\Controllers\HomeController@jobManagerAddJob')->name('manager.add_job');
        // Task List
        Route::get('/list_job', 'App\Http\Controllers\HomeController@managerListJob')->name('manager.list_job');
        //task store
        Route::post('/tasks/store', 'App\Http\Controllers\TaskController@store')->name('task.store');
        // task update
        Route::patch('/tasks/{task} ', 'App\Http\Controllers\TaskController@store')->name('task.update');
        // task delete

        // all users
        Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users.index');
        // show deparment
        Route::get('/deparments/{deparment}', 'App\Http\Controllers\HomeController@show')->name('deparment.show');

    });

// ADMIN ROUTES -------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->prefix('admin')->group(function(){

    // Dashboard
    Route::get('/', 'App\Http\Controllers\HomeController@dashboard')->name('admin.dashboard');

    //Tasks
    Route::resource('/tasks', 'App\Http\Controllers\Admin\AdminTaskController',[
        'as' => 'admin'
    ])->except(['create','edit']);

    //Deparments
    Route::resource('/deparments', 'App\Http\Controllers\Admin\AdminDeparmentController',[
        'as' => 'admin'
    ])->except(['create','edit']);

    // Users
    Route::patch('/users/{user}/status', 'App\Http\Controllers\Admin\AdminUsersController@status')->name('admin.users.status'); // blocked
    Route::resource('/users', 'App\Http\Controllers\Admin\AdminUsersController',[
        'as' => 'admin'
    ])->except(['create','edit']);

});
