<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\RoleMiddleware;
use App\Constants\UserRole;
use App\Common\Helpers;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::middleware([RoleMiddleware::class])->group(function () {
    Route::get('/test-role', function () {
        return 'Bạn có quyền truy cập!';
    })->middleware('role:' . UserRole::Admin->value);


    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/test-helper', function () { return Helpers::formatDate(now());
});

});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
