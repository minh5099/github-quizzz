<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('linh-vuc','API\LinhVucController@layDanhSach');
Route::get('cau-hoi','API\CauHoiController@layCauHoi');
Route::get('nguoi-choi','API\NguoiChoiController@layDanhSachNguoiChoi');
Route::get('goi-credit','API\GoiCreditController@layGoiCredit');
Route::post('dang-nhap','API\AuthController@dangNhap');
Route::middleware(['assign.guard:api','jwt.auth'])->group(function(){
	Route::get('lay-thong-tin','API\AuthController@layThongTin');
	Route::get('dang-xuat','API\AuthController@dangXuat');
	Route::put('cap-nhat/{id}','API\AuthController@capNhat');
});
Route::post('dang-ki','API\RegisterController@dangKi');

// Route::group([
// 	'middleware' => 'api',
// 	'namespace' => 'App\Http\Controllers',
// 	'prefix' => 'auth'
// 	],function ($router)
// 	{
		
// 	});