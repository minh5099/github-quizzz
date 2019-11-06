<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhDiemCauHoi;

class DiemHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDiemHoi = CauHinhDiemCauHoi::all();
        return view('quan-ly-udung.cau-hinh-diem',compact('listDiemHoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quan-ly-udung.form-diem-hoi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quanLyDiemHoi = new CauHinhDiemCauHoi;
        $quanLyDiemHoi->thu_tu = $request->thu_tu;
        $quanLyDiemHoi->diem = $request->diem;

        $quanLyDiemHoi->save();
        return redirect()->route('tro-giup.danh-sach');
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
        $cauHinhTroGiup = CauHinhDiemCauHoi::find($id);
        return view('quan-ly-udung.form-diem-hoi',compact('cauHinhTroGiup'));
        //Compact để đưa dữ liệu qua trang blade khi gọi
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quanLyDiemHoi = CauHinhDiemCauHoi::find($id);
        $quanLyDiemHoi->thu_tu = $request->thu_tu;
        $quanLyDiemHoi->diem = $request->diem;

        $quanLyDiemHoi->save();

        return redirect()->route('diem-hoi.danh-sach');
        //Hàm redirect để trả về view thông qua route sau khi xử lý hàm save
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quanLyDiemHoi = CauHinhDiemCauHoi::find($id);
        $quanLyDiemHoi->delete();

        return redirect()->route('diem-hoi.danh-sach');
    }
}
