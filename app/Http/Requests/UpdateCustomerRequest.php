<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'email' => 'email|nullable',
            'phone' => 'numeric|required',
            'age' => 'numeric|gte:18|nullable',
            'job' => 'max:30|nullable',
            'address' => 'max:100',
            'gender' => 'boolean',
            'employee_code' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'numeric' => ':attribute phải là kiểu số',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute chưa đúng định dạng',
            'gte' => ':attribute phải lớn hơn hoặc bằng 18',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'gender' => 'Giới tính',
            'job' => 'Nghề nghiệp',
            'age' => 'Tuổi',
            'employee_code' => 'Nhân viên hỗ trợ'
        ];
    }
}
