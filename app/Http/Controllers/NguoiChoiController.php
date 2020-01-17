<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use App\Http\Requests\RequestNguoiChoi;

class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNguoiChoi = NguoiChoi::all();
        return view('nguoi-choi.danh-sach',compact('listNguoiChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nguoi-choi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestNguoiChoi $request)
    {
        $nguoiChoi = new NguoiChoi;
        $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiChoi->mat_khau = $request->mat_khau;
        $nguoiChoi->mail = $request->mail;
        if($request->hasFile('hinh_dai_dien'))
        {
            $file = $request->hinh_dai_dien;
            $fileLast = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img'),$filename);
            $nguoiChoi->hinh_dai_dien = $filename;
        }
        $nguoiChoi->diem_cao_nhat = $request->diem_cao_nhat;
        $nguoiChoi->credit = $request->credit;
        $nguoiChoi->mat_khau = bcrypt($request->mat_khau);
        $nguoiChoi->save();
        return redirect()->route('nguoi-choi.danh-sach')->with('success','Thêm Mới Thành Công');
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
        $nguoiChoi = NguoiChoi::find($id);
        return view('nguoi-choi.form',compact('nguoiChoi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestNguoiChoi $request, $id)
    {
        $nguoiChoi = NguoiChoi::find($id);
        $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiChoi->mat_khau = $request->mat_khau;
        $nguoiChoi->mail = $request->mail;
        if($request->hasFile('hinh_dai_dien'))
        {
            $file = $request->hinh_dai_dien;
            $fileLast = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img'),$filename);
            $nguoiChoi->hinh_dai_dien = $filename;
        }
        $nguoiChoi->diem_cao_nhat = $request->diem_cao_nhat;
        $nguoiChoi->credit = $request->credit;
        $nguoiChoi->mat_khau = bcrypt($request->mat_khau);
        
        $nguoiChoi->save();
        return redirect()->route('nguoi-choi.danh-sach')->with('success','Cập Nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoiChoi = NguoiChoi::find($id);
        $nguoiChoi->delete();

        return redirect()->route('nguoi-choi.danh-sach');
    }

    public function bin()
    {
        $deleteNC = NguoiChoi::onlyTrashed()->get();
        return view('nguoi-choi.bin',compact('deleteNC'));
    }

    public function restore($id)
    {
        NguoiChoi::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('nguoi-choi.danh-sach');
    }
}
