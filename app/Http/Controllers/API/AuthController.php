<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NguoiChoi;
use Validator;

class AuthController extends Controller
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
                'message' => 'Unauthorized.'],401);
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

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function dangXuat()
    {
        auth('api')->logout();
        return response()->json([
            'message' => 'Đăng Xuất Thành Công'
        ]);
    }

    public function capNhat(Request $request,NguoiChoi $nguoiChoi)
    {
        if(auth('api')->user() != null)
        {
            $nguoiChoi = NguoiChoi::where('id',auth('api')->user()->id)->first();
            if($nguoiChoi != null)
            {
                $validator = Validator::make($request->all(),[
                    'hinh_dai_dien' => 'required',
                    'mail' => 'required|unique:nguoi_chois',
                    'ten_dang_nhap' => 'required',
                    'mat_khau' => 'required',
                ]);

                $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
                $nguoiChoi->hinh_dai_dien = $request->hinh_dai_dien;
                $nguoiChoi->mail = $request->mail;
                $nguoiChoi->mat_khau = $request->mat_khau;

                $nguoiChoi->save();

                $credentials = [
                    'ten_dang_nhap' => $req->ten_dang_nhap,
                    'password' => $req->mat_khau
                ];
                $token = auth('api')->attempt($credentials)
                return response()->json([
                    'success' => true;
                    'message' => 'cập nhật thành công';
                    'token' => $token;
                ],200);
            }
            return response()->json([
                'success' => false;
                'message' => 'cập nhật thất bại';
            ],401);
        }
    }
