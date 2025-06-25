<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'phone'    => 'nullable|string|regex:/^[0-9]{10,11}$/',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'avatar'   => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'         => 'Tên không được để trống.',
            'name.max'              => 'Tên không vượt quá 255 ký tự.',
            'email.email'           => 'Email không đúng định dạng.',
            'email.unique'          => 'Email đã được sử dụng.',
            'password.confirmed'    => 'Xác nhận mật khẩu không khớp.',
            'phone.regex'           => 'Số điện thoại không đúng định dạng.',
        ];
    }
}