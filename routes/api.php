<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('logout', [AuthController::class, 'logout']);

    /* Task Operations */
    Route::prefix('task')->group(function () {
        Route::get('create-task', [TaskController::class, 'create']);
        Route::put('update-task', [TaskController::class, 'update']);
        Route::post('delete-task', [TaskController::class, 'delete']);
    });

}

);

Route::get('login', [AuthController::class, 'login']);
