<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'status' => 'numeric',
            'note' => 'max:50',
            'customer_id' => 'required',
            'product_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'numeric' => ':attribute phải là kiểu số',
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Mã đơn hàng',
            'note' => 'Ghi chú',
            'customer_id' => 'Khách hàng',
            'product_id' => 'Sản phẩm'
        ];
    }
}
