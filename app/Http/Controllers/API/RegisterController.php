<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\NguoiChoi;

class RegisterController extends Controller
{
     public function dangKi(Request $request){

        $validator = Validator::make($request->all(),[
        	'hinh_dai_dien' => 'required',
            'mail' => 'required|unique:nguoi_chois',
            'ten_dang_nhap' => 'required',
            'mat_khau' => 'required',
        ]);

        if($validator->fails())
        {
        	return response()->json([
        		'success' => false,
        		'message' => 'Tạo Người Chơi Thất Bại',
        		'error' => $validator->errors()
        	],401);
        }

        $user = new NguoiChoi();
        $user->ten_dang_nhap = $request->ten_dang_nhap;
        $user->mat_khau = bcrypt($request->mat_khau);
        $user->mail = $request->mail;
        $user->hinh_dai_dien = $request->hinh_dai_dien;
        $user->diem_cao_nhat = '0';
        $user->credit = '500';
        $user->save();
        return response()->json([
        	'success' => true,
        	'message' => 'Tạo Người Chơi Thành Công',
        ],200);
    }

    public function layThongTin()
	{
		return auth('api')->user();
	}
}
