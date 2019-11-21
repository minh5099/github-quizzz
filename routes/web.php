<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('admin/dangnhap','QuanTriVienController@getLogin')->name('dangnhap');
Route::post('admin/dangnhap','QuanTriVienController@postLogin')->name('xu-ly');

//Route Logout
Route::get('admin/logout','QuanTriVienController@logoutAdmin')->name('logout');



Route::middleware('adminLogin')->group(function(){
	Route::prefix('linh-vuc')->group(function() {
		Route::name('linh-vuc.')->group(function() {
			Route::get('/', 'LinhVucController@index')->name('danh-sach');
			Route::get('them-moi', 'LinhVucController@create')->name('them-moi');
			Route::post('them-moi', 'LinhVucController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}', 'LinhVucController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}', 'LinhVucController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}', 'LinhVucController@destroy')->name('xoa');
			Route::get('bin','LinhVucController@bin')->name('bin');
			Route::get('restore/{id}','LinhVucController@restore')->name('restore');
		});
	});

	Route::prefix('cau-hoi')->group(function() {
		Route::name('cau-hoi.')->group(function() {
			Route::get('/', 'CauHoiController@index')->name('danh-sach');
			Route::get('them-moi', 'CauHoiController@create')->name('them-moi');
			Route::post('them-moi', 'CauHoiController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}', 'CauHoiController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}', 'CauHoiController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}', 'CauHoiController@destroy')->name('xoa');
			Route::get('bin','CauHoiController@bin')->name('bin');
			Route::get('restore/{id}','CauHoiController@restore')->name('restore');
		});
	});

	Route::prefix('goi-credit')->group(function(){
		Route::name('goi-credit.')->group(function(){
			Route::get('/','GoiCreditController@index')->name('danh-sach');
			Route::get('them-moi','GoiCreditController@create')->name('them-moi');
			Route::post('them-moi','GoiCreditController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}','GoiCreditController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}','GoiCreditController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}','GoiCreditController@destroy')->name('xoa');
			Route::get('bin','GoiCreditController@bin')->name('bin');
			Route::get('restore/{id}','GoiCreditController@restore')->name('restore');
		});
	});

	Route::prefix('nguoi-choi')->group(function(){
		Route::name('nguoi-choi.')->group(function(){
			Route::get('/','NguoiChoiController@index')->name('danh-sach');
			Route::get('them-moi','NguoiChoiController@create')->name('them-moi');
			Route::post('them-moi','NguoiChoiController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}','NguoiChoiController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}','NguoiChoiController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}','NguoiChoiController@destroy')->name('xoa');
			Route::get('bin','NguoiChoiController@bin')->name('bin');
			Route::get('restore/{id}','NguoiChoiController@restore')->name('restore');
		});
	});

	Route::prefix('quan-tri-vien')->group(function(){
		Route::name('quan-tri-vien.')->group(function(){
			Route::get('/','QuanTriVienController@index')->name('danh-sach');
			Route::get('them-moi','QuanTriVienController@create')->name('them-moi');
			Route::post('them-moi','QuanTriVienController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}','QuanTriVienController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}','QuanTriVienController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}','QuanTriVienController@destroy')->name('xoa');
			Route::get('bin','QuanTriVienController@bin')->name('bin');
			Route::get('restore/{id}','QuanTriVienController@restore')->name('restore');
			Route::get('delDt/{id}','QuanTriVienController@delData')->name('delDt');
		});
	});

	Route::prefix('app')->group(function(){
		Route::name('app.')->group(function(){
			Route::get('/','CauHinhAppController@index')->name('danh-sach');
			Route::get('them-moi','CauHinhAppController@create')->name('them-moi');
			Route::post('them-moi','CauHinhAppController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}','CauHinhAppController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}','CauHinhAppController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}','CauHinhAppController@destroy')->name('xoa');
		});
	});

	Route::prefix('diem-hoi')->group(function(){
		Route::name('diem-hoi.')->group(function(){
			Route::get('/','DiemHoiController@index')->name('danh-sach');
			Route::get('them-moi','DiemHoiController@create')->name('them-moi');
			Route::post('them-moi','DiemHoiController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}','DiemHoiController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}','DiemHoiController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}','DiemHoiController@destroy')->name('xoa');
		});
	});

	Route::prefix('tro-giup')->group(function(){
		Route::name('tro-giup.')->group(function(){
			Route::get('/','TroGiupController@index')->name('danh-sach');
			Route::get('them-moi','TroGiupController@create')->name('them-moi');
			Route::post('them-moi','TroGiupController@store')->name('xu-ly-them-moi');
			Route::get('cap-nhat/{id}','TroGiupController@edit')->name('cap-nhat');
			Route::post('cap-nhat/{id}','TroGiupController@update')->name('xu-ly-cap-nhat');
			Route::get('xoa/{id}','TroGiupController@destroy')->name('xoa');
		});
	});
	Route::get('/', function () {
	    return view('layout');
	})->name('dashboard');
});