<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'phone' => 'numeric|unique:user_info|nullable',
            'address' => 'max:100',
            'gender' => 'boolean',
            'role' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'min' => ':attribute không được nhở hơn :min ký tự',
            'numeric' => ':attribute phải là kiểu số',
            'unique' => ':attribute đã tồn tại',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên chức vụ',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
            'role' => 'Chức vụ'
        ];
    }
}
