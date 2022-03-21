<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'new_password' => 'Mật khẩu hiện tại',
            'confirm_password' => 'Mật khẩu xác nhận',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'confirm_password.confirmed' => ' :attribute xác nhận không chính xác',
        ];
    }
}
