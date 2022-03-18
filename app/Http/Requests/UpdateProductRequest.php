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
            'name' => 'required|max:100|unique:products',
            'price' => 'required|numeric|gte:0',
            'quantity' => 'required|numeric|gte:0',
            'description' => 'max:5000|nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2000',
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
            'unique' => ':attribute đã tồn tại'
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
            'total_sold' => 'Số lượng đã bán',
        ];
    }
}
