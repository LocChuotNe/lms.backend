<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RoleMiddleware;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
