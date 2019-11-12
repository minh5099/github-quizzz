<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestGoiCredit extends FormRequest
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
            'ten_goi' => 'required|unique:goi_credits,ten_goi|min:1',
            'credit' => 'required|unique:goi_credits,credit|min:1|integer|max:7',
            'so_tien' => 'required|unique:goi_credits,so_tien|min:1|integer|max:6'
        ];
    }

    public function messages()
    {
        return [
            'ten_goi.required' => 'Nhập Tên Gói',
            'ten_goi.unique' => 'Gói Đã Tồn Tại',
            'ten_goi.min' => 'Tên Gói > 5 Kí Tự',
            'credit.required' => 'Nhập Credit',
            'credit.unique' => 'Credit Đã Tồn Tại',
            'credit.min' => 'credit > 1',
            'credit.max' => 'credit < 999999',
            'so_tien.required' => 'Nhập Số Tiền',
            'so_tien.unique' => 'Số Tiền đã Tồn Tại',
            'so_tien.min' => 'Số Tiền > 1',
            'so_tien.max' => 'Số Tiền < 999999' 
        ];
    }
}
