<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLinhVuc extends FormRequest
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
            'ten_linh_vuc' => 'required|unique:linh_vucs,ten_linh_vuc|min:5'
        ];
    }

    public function messages()
    {
        return [
            'ten_linh_vuc.required' => 'Vui Lòng Nhập Tên Lĩnh Vực',
            'ten_linh_vuc.unique' => 'Tên Lĩnh Vực Đã Tồn Tại',
            'ten_linh_vuc.min' => 'Lĩnh vực > 5 kí tự'
        ];
    }
}
