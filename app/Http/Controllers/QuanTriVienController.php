<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanTriVien;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestQuanTriVien;

class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listQuanTri = QuanTriVien::all();
        return view('quan-tri-vien.danh-sach',compact('listQuanTri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quan-tri-vien.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestQuanTriVien $request)
    {
        $quanTriVien = new QuanTriVien();
        $quanTriVien->ten_dang_nhap = $request->ten_dang_nhap;
        $quanTriVien->mat_khau = $request->mat_khau;
        $quanTriVien->ho_ten = $request->ho_ten;
        $quanTriVien->mat_khau = bcrypt($request->mat_khau);
        $quanTriVien->save();

        return redirect()->route('quan-tri-vien.danh-sach');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quanTriVien = QuanTriVien::find($id);

        return view('quan-tri-vien.form',compact('quanTriVien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestQuanTriVien $request, $id)
    {
        $quanTriVien = QuanTriVien::find($id);
        $quanTriVien->ten_dang_nhap = $request->ten_dang_nhap;
        $quanTriVien->mat_khau = $request->mat_khau;
        $quanTriVien->ho_ten = $request->ho_ten;
        $quanTriVien->mat_khau = bcrypt($request->mat_khau);
        $quanTriVien->save();
        return redirect()->route('quan-tri-vien.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quanTriVien = QuanTriVien::find($id);
        $quanTriVien->delete();

        return redirect()->route('quan-tri-vien.danh-sach');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['ten_dang_nhap' => $request->email,'mat_khau' => $request->password]))
        {
            return redirect('/');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng Nhập Thất Bại');
        }
    }
}
