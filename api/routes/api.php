<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::post('login',[AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('verify-email', [AuthController::class,'verifyEmail']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);

    Route::prefix('me')->group(function() {
        Route::get('', [MeController::class, 'index']);
        Route::put('/update', [MeController::class, 'update']);
    });
});
