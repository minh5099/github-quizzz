<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCauHoi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'noi_dung' => 'required|unique:cau_hois,noi_dung|min:10',
            'linh_vuc' => 'required',
            'phuong_an_a' => 'required|min:10',
            'phuong_an_b' => 'required|min:10',
            'phuong_an_c' => 'required|min:10',
            'phuong_an_d' => 'required|min:10',
            'dap_an' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'noi_dung.required' => 'Yêu Cầu Nhập Nội Dung.',
            'noi_dung.unique' => 'Nội Dung Đã Tồn Tại.',
            'noi_dung.min' => 'Nội Dung Lớn Hơn 10 Kí Tự.',
            'linh_vuc.required' => 'Yêu Cầu Chọn Lĩnh Vực.',
            'phuong_an_a.required' => 'Yêu Cầu Nhập Phương Án a.',
            'phuong_an_a.min' => 'Phương án > 10 Kí Tự.',
            'phuong_an_b.required' => 'Yêu Cầu Nhập Phương Án b.',
            'phuong_an_b.min' => 'Phương án > 10 Kí Tự.',
            'phuong_an_c.required' => 'Yêu Cầu Nhập Phương Án c.',
            'phuong_an_c.min' => 'Phương án > 10 Kí Tự.',
            'phuong_an_d.required' => 'Yêu Cầu Nhập Phương Án d.',
            'phuong_an_d.min' => 'Phương án > 10 Kí Tự.', 
            'dap_an.required' => 'Yêu Cầu Nhập Đáp Án.',
            'dap_an.min' => 'Đáp án > 10 Kí Tự'
        ];
    }
}
