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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@welcome')->name('welcome');

// Tasks
Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks');
    // Managers -----------------------------------------------------------------------------------------------------
    Route::get('/manager/add_job', 'App\Http\Controllers\HomeController@jobManagerAddJob')->name('manager.add_job');
        // task store
        Route::get('/manager/list_job', 'App\Http\Controllers\HomeController@managerListJob')->name('manager.list_job');
        // task update

        // task delete

        // show deparment
        Route::get('/manager/deparments/{deparment}', 'App\Http\Controllers\HomeController@show')->name('deparment.show');


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
