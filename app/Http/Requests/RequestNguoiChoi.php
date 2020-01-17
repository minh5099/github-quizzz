<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestNguoiChoi extends FormRequest
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
            'ten_dang_nhap' => 'required|min:5|max:100',
            'mat_khau' => 'required|min:10|max:256',
            'mail' => 'required|email|unique:nguoi_chois,mail|min:8|max:100',
            'hinh_dai_dien' => 'required|image|mimes:png,jpg,jpeg',
            'diem_cao_nhat' => 'required|min:1|max:9999|integer',
            'credit' => 'required|min:1|max:9999|integer'
        ];
    }

    public function messages()
    {
        return [
            'ten_dang_nhap.required' => 'Nhập Tên Đăng Nhập',
            'ten_dang_nhap.min' => 'Tên Đăng Nhập > 5 Kí Tự',
            'ten_dang_nhap.max' => 'Tên Đăng Nhập < 100 Kí Tự',
            'mat_khau.required' => 'Nhập Mật Khẩu',
            'mat_khau.min' => 'Mật Khẩu > 10 Kí Tự',
            'mat_khau.max' => 'Mật Khẩu < 100 Kí Tự',
            'mail.required' => 'Email Không Được Để Trống',
            'mail.email' => 'Nhập Đúng Định Dạng Email',
            'mail.unique' => 'Email Đã Tồn Tại',
            'mail.min' => 'Email > 10 Kí Tự',
            'mail.max' => 'Email < 100 Kí Tự',
            'hinh_dai_dien' => 'Chọn Ảnh Đại Diện',
            'hinh_dai_dien' => 'Chọn File Sai',
            'diem_cao_nhat.required' => 'Nhập Điểm',
            'diem_cao_nhat.min' => 'Điểm >= 0',
            'diem_cao_nhat.max' => 'Điểm cao nhất : 9999s',
            'credit.required' => 'Nhập Credit',
            'credit.min' => 'Credit Yêu Cầu 1 chứ số',
            'credit.max' => 'Credit Max 9999'
        ];
    }
}
