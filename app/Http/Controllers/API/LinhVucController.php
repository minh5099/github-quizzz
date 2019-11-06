<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LinhVuc;

class LinhVucController extends Controller
{
    //Gọi hàm để gọi API để lấy danh sách
	public function layDanhSach()
	{
		$listLinhVuc = LinhVuc::all()->random(4);

		$result = [
			'success' => true,
			'data' => $listLinhVuc
		];
		return responese()->json($result);
	}
}
