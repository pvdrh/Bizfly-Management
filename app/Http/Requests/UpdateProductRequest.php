<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'nullable|max:100',
            'quantity' => 'gte:1',
            'description' => 'max:5000|nullable',
            'image' => 'nullable',
            'price' => 'required:gte:1'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'nullable' => ':attribute có thể để trống',
            'numeric' => ':attribute phải là kiểu số',
            'gte' => ':attribute phải lớn hơn hoặc bằng 0',
            'mimes' => ':attribute không đúng định dạng',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả',
            'image' => 'Ảnh sản phẩm',
            'price' => 'Giá bán',
            'quantity' => 'Số lượng',
        ];
    }
}
