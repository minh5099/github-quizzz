<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestQuanTriVien extends FormRequest
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
            'ten_dang_nhap' => 'required|unique:quan_tri_viens:ten_dang_nhap|min:8|max:100|gmail',
            'ho_ten' => 'required|min:10|max:255',
            'mat_khau' => 'required|min:8|max:255'
        ];
    }

    public function messages()
    {
        return [
            'ten_dang_nhap.required' => 'Nhập Tên Đăng Nhập',
            'ten_dang_nhap.unique' => 'Tên Đăng Nhập Đã Tồn Tại',
            'ten_dang_nhap.min' => 'Tên Đăng Nhập > 8 Kí Tự',
            'ten_dang_nhap.max' => 'Tên Đăng Nhập < 100 Kí Tự',
            'ten_dang_nhap.gmail' => 'Nhập Đúng Định Dạng @gmail.'
            'ho_ten.required' => 'Nhập Họ Tên Tên',
            'ho_ten.min' => 'Họ Tên > 10 Kí Tự',
            'ho_ten.max' => 'Họ Tên < 255 Kí Tự',
            'mat_khau.required' => 'Nhập Mật Khẩu',
            'mat_khau.min' => 'Mật Khẩu > 8 Kí Tự',
            'mat_khau.max' => 'Mật Khẩu < 255 Kí Tự'
        ];
    }
}
