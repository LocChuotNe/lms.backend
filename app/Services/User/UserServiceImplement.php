<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Auth\AuthenticatableException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserServiceImplement implements UserService{
    public function __construct(
        protected UserRepository $userRepository
    ) {}

    public function register(array $data): array
    {
        $user = $this->userRepository->create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'phone'     => $data['phone'] ?? null,
            'is_active' => true,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer',
        ];
    }

    public function login(array $credentials): array
    {
        if (!Auth::attempt([
            'email'    => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            throw new AuthenticationException('Thông tin đăng nhập không chính xác.');
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer',
        ];
    }

    public function logout(): bool
    {
        $user = Auth::user();
        if ($user) {
            $user->currentAccessToken()?->delete();
            return true;
        }
        return false;
    }

    public function getProfile(): User
    {
        return Auth::user();
    }

    public function updateProfile(array $data): User
    {
        $user = Auth::user();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->userRepository->update($user, $data);
    }

}
