<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhApp;

class CauHinhAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listcauHinhApp = CauHinhApp::all();
        return view('quan-ly-udung.cau-hinh-app',compact('listcauHinhApp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quan-ly-udung.form-app');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cauHinhApp = new CauHinhApp;
        $cauHinhApp->co_hoi_sai = $request->co_hoi_sai;
        $cauHinhApp->thoi_gian_tra_loi = $request->thoi_gian_tra_loi;

        $cauHinhApp->save();
        return redirect()->route('app.danh-sach');
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
        $cauHinhApp = CauHinhApp::find($id);
        return view('cau-hinh-app.form-app',compact('cauHinhApp'));
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
        $cauHinhApp = CauHinhApp::find($id);
        $cauHinhApp->co_hoi_sai = $request->co_hoi_sai;
        $cauHinhApp->thoi_gian_tra_loi = $request->thoi_gian_tra_loi;

        $cauHinhApp->save();

        return redirect()->route('app.danh-sach');
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
        $cauHinhApp = CauHinhApp::find($id);
        $cauHinhApp->delete();

        return redirect()->route('app.danh-sach');
    }
}
