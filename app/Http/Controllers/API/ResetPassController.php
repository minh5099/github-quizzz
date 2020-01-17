<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\NguoiChoi;
use Illuminate\Support\Facades\Mail;
use App\Mail\getMail;

class ResetPassController extends Controller
{
   	public function resetPassword(Request $req)
   	{
   		$emailUser = $req->mail;
         $userName = $req->username;
   		$newPassword = Str::random(9);
   		$nguoiChoi = NguoiChoi::where([['mail','=',$emailUser],['ten_dang_nhap','=',$userName]])->first();

   		if($nguoiChoi!=null)
   		{
   			$nguoiChoi->mat_khau = $newPassword;
   			Mail::to($emailUser)->send(new getMail($nguoiChoi));
   			$nguoiChoi->mat_khau = bcrypt($newPassword);
   			$nguoiChoi->save();
   			return response()->json([
   				'status' => true,
   				'message' => 'Mật khẩu đã được gửi',
   			],200);
   		}
         else{
   		return response()->json([
   			'status' => false,
   			'message' => 'Xử lý thất bại',
   		],401);
      }
   	}
}
