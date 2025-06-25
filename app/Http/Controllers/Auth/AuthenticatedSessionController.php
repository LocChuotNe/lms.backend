<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\User\UserService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;

class AuthenticatedSessionController extends Controller
{
    public function __construct(protected UserService $userService) {}

    /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $result = $this->userService->login($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công.',
                'data' => $result,
            ]);
        } catch (AuthenticationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đăng nhập thất bại.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(): JsonResponse
    {
        try {
            $this->userService->logout();

            return response()->json([
                'success' => true,
                'message' => 'Đăng xuất thành công.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đăng xuất thất bại.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}