<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichSuMuaCredit;
use App\NguoiChoi;
use DB;

class LichSuMuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //->select('nguoi_chois.ten_dang_nhap','goi_credits.ten_goi')
        // //$dsNguoiChoi = LichSuMuaCredit::all();
        // $dsNguoiChoi = NguoiChoi::find(1)->dsNguoiChoi;
        // return view('goi-credit.lich-su-mua-credit',compact('dsNguoiChoi'));
        $data = DB::table('lich_su_mua_credits')
                        ->join('nguoi_chois','nguoi_chois.id','=','lich_su_mua_credits.nguoi_choi_id')
                        ->join('goi_credits','goi_credits.id','=','lich_su_mua_credits.goi_credit_id')
                        ->get();
        // Join vỚI bảng khác để lấy dữ liệu ra
        return view('goi-credit.lich-su-mua-credit',compact('data'));
    }
}
