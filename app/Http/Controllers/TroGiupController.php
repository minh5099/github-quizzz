<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhTroGiup;

class TroGiupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTroGiup = CauHinhTroGiup::all();
        return view('quan-ly-udung.cau-hinh-tro-giup',compact('listTroGiup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quan-ly-udung.form-tro-giup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cauHinhTroGiup = new CauHinhTroGiup;
        $cauHinhTroGiup->loai_tro_giup = $request->loai_tro_giup;
        $cauHinhTroGiup->thu_tu = $request->thu_tu;
        $cauHinhTroGiup->credit = $request->credit;

        $cauHinhTroGiup->save();
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
        $cauHinhTroGiup = CauHinhTroGiup::find($id);
        return view('cau-hinh-app.form-tro-giup',compact('cauHinhTroGiup'));
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
        $cauHinhTroGiup = CauHinhTroGiup::find($id);
        $cauHinhTroGiup->loai_tro_giup = $request->loai_tro_giup;
        $cauHinhTroGiup->thu_tu = $request->thu_tu;
        $cauHinhTroGiup->credit = $request->credit;

        $cauHinhTroGiup->save();

        return redirect()->route('tro-giup.danh-sach');
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
        $cauHinhTroGiup = CauHinhTroGiup::find($id);
        $cauHinhTroGiup->delete();

        return redirect()->route('tro-giup.danh-sach');
    }
}
