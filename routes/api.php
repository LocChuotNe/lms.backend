<?php

use Illuminate\Support\Facades\Route;
use App\Common\ApiResponse;
use App\Repositories\User\UserRepository;
use App\Services\User\UserService;

Route::get('/test', function () {
    return response()->json(['message' => 'Laravel API được kết nối!']);
});

//test
Route::get('/test-response', function () {
    return ApiResponse::success(['data' => 'Hello!']);
});

//test
Route::get('/test-service', function (UserService $userService) {
    return $userService->registerUser([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('password')
    ]);
});
