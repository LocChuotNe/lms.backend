<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function __construct(protected UserService $userService) {}

    /**
     * Get user profile.
     */
    public function show(): JsonResponse
    {
        try {
            $user = $this->userService->getProfile();

            return response()->json([
                'success' => true,
                'data' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể lấy thông tin profile.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update user profile.
     */
    public function update(ProfileUpdateRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->profileUpdate($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật profile thành công.',
                'data' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Cập nhật profile thất bại.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}