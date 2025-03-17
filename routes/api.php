<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\Auth\OtpController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public Routes (Unauthenticated) - Stricter limits
Route::middleware('throttle:10,1')->group(function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('throttle:5,1')->group(function () {
    Route::post('/resend-otp', [OtpController::class, 'resendOtp']);
    Route::post('/verify-otp', [OtpController::class, 'verify']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function (Request $request) {
        return $request->user();
    })->middleware('throttle:60,1');

    Route::middleware('verified.api')->group(function () {
        Route::post('/logout', [LogoutController::class, 'logout'])->middleware('throttle:10,1');
        Route::patch('/profile', [ProfileController::class, 'update'])->middleware('throttle:20,1');

        ################################ notes ################################
        Route::apiResource('notes', NoteController::class)->middleware('throttle:60,1');
    });
});
