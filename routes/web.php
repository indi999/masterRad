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
Route::get('/', 'PagesController@index')->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Tasks
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
    // Managers -----------------------------------------------------------------------------------------------------
        // task store
        // task update
        // task delete


// ADMIN ROUTES -------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->prefix('admin')->group(function(){
    // Dashboard
    Route::get('/', 'HomeController@dashboard')->name('admin.dashboard');

    //Tasks
    Route::resource('/tasks', 'Admin\AdminTaskController',[
        'as' => 'admin'
    ])->except(['create','edit']);

    //Deparments
    Route::resource('/deparments', 'Admin\AdminDeparmentController',[
        'as' => 'admin'
    ])->except(['create','edit']);

    // Users
    Route::patch('/users/{user}/status', 'Admin\AdminUsersController@status')->name('admin.users.status'); // blocked
    Route::resource('/users', 'Admin\AdminUsersController',[
        'as' => 'admin'
    ])->except(['create','edit']);

});
