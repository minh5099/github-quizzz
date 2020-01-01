<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LuotChoi;

class LichSuChoi extends Controller
{
	public function layBangXepHang(Request $request){

		if(auth('api')->user() != null){
			$page = $request->query('page',1);
			$limit = $request->query('limit',10);

			$listLuotChoi = LuotChoi::orderBy('diem_cao_nhat','desc')->skip(($page-1) * $limit)->take($limit)->get();

			return response()->json([
				'total'=> LuotChoi::count(),
				'data' => $listLuotChoi
			]);
		}
	}

	public function layLichSuChoi(Request $request){
		if(auth('api')->user() != null){
			$page = $request->query('page',1);
			$limit = $request->query('limit',10);

			$listLuotChoi = LuotChoi::orderBy('created_ad','desc')->skip(($page-1) * $limit)->take($limit)->get();

			return response()->json([
				'total'=> LuotChoi::count(),
				'data' => $listLuotChoi
			]);
		}  	
	}
}
