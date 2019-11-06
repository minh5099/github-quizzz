<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NguoiChoi;

class NguoiChoiController extends Controller
{
    public function layDanhSachNguoiChoi(Request $request){
    	$page = $request->query('page',1);
    	$limit = $request->query('limit',10);

    	$listNguoiChoi = NguoiChoi::orderBy('diem_cao_nhat','desc')->skip(($page-1) * $limit)->take($limit)->get();

    	return response()->json([
    		'total'=> NguoiChoi::count(),
    		'data' => $listNguoiChoi
    	]);
    }

    public function Register(Register $request){
    	$request->validate([
    		'mail' -> 'required',
    		'ten_dang_nhap' -> 'required',
    		'mat_khau' -> 'required'
    	]);

    	$user = new NguoiChoi();
    	$user->username = $request->ten_dang_nhap;
    	$user->pass = $request->mat_khau;
    	$user->mail = $request->mail;

    	$user->save();
    }

    public function LoginApi(Request $request)
    {

    	$loginData = $response->validate([
    		'mail' => 'mail|required',
    		'ten_dang_nhap' => 'required',
    		'mat_khau' => 'required'
    	]);

    	if(!auth()->attemp($loginData)){
    		return response(['message'=>'Invalid credentials']);
    	}
    }
}
