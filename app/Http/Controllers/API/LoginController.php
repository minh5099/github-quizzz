<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function dangNhap(Request $req)
    {
    	$credentials = [
    		'ten_dang_nhap' => $req->ten_dang_nhap,
    		'password' => $req->mat_khau
    	];
	    if (!$token = auth('api')->attempt($credentials))
	    {
	    	# Sai Tên Đăng Nhập và Mật Khẩu
	    	return response()->json([
	    		'status' => false,
	    		'message' => 'Unauthorized.'
	    	],401);
	    }

	    #Trả về đăng nhập đúng
	    return response()->json([
	    	'status' => true,
	    	'message' => 'Authorized.',
	    	'token' => $token,
	    	'type' => 'bearer',
	    	'expires' => auth('api')->factory()->getTTL() * 60 #Lấy Thời gian Khai báo trong env
	    ],200); 
	}

	public function layThongTin()
	{
		return auth('api')->user();
	}
}
