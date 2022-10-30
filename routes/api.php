<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//USERS-------------------------------------------------------------------------------
// Tasks api
Route::prefix('api')->group(function() {
    Route::get('tasks', 'App\Http\Controllers\Api\V1\TasksController@index');
    Route::get('task/{id}', 'App\Http\Controllers\Api\V1\TasksController@show');
    Route::post('task', 'App\Http\Controllers\Api\V1\TasksController@store');
    Route::put('task/{task}', 'App\Http\Controllers\Api\V1\TasksController@update');
    Route::delete('tasks/{task}', 'App\Http\Controllers\Api\V1\TasksController@delete');
});
// ADMIN------------------------------------------------------------------------------

