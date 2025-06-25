<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;
use App\Models\User;
use Illuminate\Auth\AuthenticatableException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

interface UserService {
    public function register(array $data): array;
    public function login(array $credentials): array;
    public function logout(): bool;
    public function getProfile(): User;
    public function updateProfile(array $data): User;
}
