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
            'email' => 'required|unique:quan_tri_viens|min:5|max:100|email',
            'ho_ten' => 'required|min:5|max:255',
            'password' => 'required|min:8|max:255'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Nhập Tên Đăng Nhập',
            'email.unique' => 'Tên Đăng Nhập Đã Tồn Tại',
            'email.min' => 'Tên Đăng Nhập > 5 Kí Tự',
            'email.max' => 'Tên Đăng Nhập < 100 Kí Tự',
            'email.email' => 'Nhập Đúng Định Dạng @mail.',
            'ho_ten.required' => 'Nhập Họ Tên Tên',
            'ho_ten.min' => 'Họ Tên > 5 Kí Tự',
            'ho_ten.max' => 'Họ Tên < 255 Kí Tự',
            'password.required' => 'Nhập Mật Khẩu',
            'password.min' => 'Mật Khẩu > 8 Kí Tự',
            'password.max' => 'Mật Khẩu < 255 Kí Tự'
        ];
    }
}
