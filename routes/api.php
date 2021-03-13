<?php

use App\Http\Controllers\TaskController;
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


Route::get('/tasks/{user_id}/', [TaskController::class, 'getTasksByUserId']);
Route::prefix('/task/{task_id}')->group(function () {
    Route::get('/', [TaskController::class, 'getTaskById']);
    Route::get('/complete/', [TaskController::class, 'completeTaskById']);
    Route::get('/refuse/', [TaskController::class, 'refuseTaskById']);
});