<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function __construct(protected UserService $userService) {}


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegisterRequest $request): JsonResponse
    {
       try {
        $result = $this->userService->register($request->validated());
        return response()->json([
            'success'   => true,
            'message'   => 'Dang ky thanh cong',
            'data'      => $result,
        ]);
       } catch (\Exception $e) {
            return response()->json([
                'succsess'  => false,
                'message'   => 'Dang ky that bai',
                'error'      =>$e->getMessage(),
            ], 500);
       }
    }
}
