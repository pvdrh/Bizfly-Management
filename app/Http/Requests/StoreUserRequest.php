<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:30',
            'email' => 'required|email|unique:user_info|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|min:6|max:20',
            'phone' => 'unique:user_info|nullable|regex:/(09|03|07|08|05)[0-9]{8}/',
            'address' => 'max:100',
            'gender' => 'nullable',
            'role' => 'required|numeric',
            'code' => 'unique:user_info'
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
            'email' => ':attribute chưa đúng định dạng',
            'regex' => ':attribute chưa đúng định dạng',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên nhân viên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
            'role' => 'Chức vụ'
        ];
    }
}
