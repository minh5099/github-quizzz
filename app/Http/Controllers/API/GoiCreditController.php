<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GoiCredit;

class GoiCreditController extends Controller
{
    //
    public function layGoiCredit()
	{
		$goiCredit = GoiCredit::all();
		$result = [
			'success' => true,
			'data' => $goiCredits
		];
		return responese()->json($result);
	}
}
