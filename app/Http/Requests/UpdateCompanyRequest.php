<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => 'required|max:100|unique:companies',
            'phone' => 'numeric|min:10|nullable',
            'address' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'min' => ':attribute không được nhở hơn :min ký tự',
            'numeric' => ':attribute phải là kiểu số',
            'nullable' => ':attribute có thể để trống',
            'unique' => ':attribute không được trùng nhau'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ'
        ];
    }
}
