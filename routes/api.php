<?php

use Illuminate\Support\Facades\Route;
use App\Common\ApiResponse;
use App\Repositories\User\UserRepository;
use App\Services\User\UserService;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Settings\ProfileController;

Route::get('/test', function () {
    return response()->json(['message' => 'Laravel API được kết nối!']);
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'register']);
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthenticatedSessionController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
});