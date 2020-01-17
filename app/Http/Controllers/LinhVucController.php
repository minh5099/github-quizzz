<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinhVuc;
use App\CauHoi;
use App\Http\Requests\RequestLinhVuc;

class LinhVucController extends Controller
{
    public function exd()
    {
        return view('linh-vuc.formPopup');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listLinhVuc = LinhVuc::all();
        return view('linh-vuc.danh-sach', compact('listLinhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('linh-vuc.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestLinhVuc $request)
    {
        $linhVuc = new LinhVuc;
        $linhVuc->ten_linh_vuc = $request->ten_linh_vuc;
        $linhVuc->save();

        return redirect()->route('linh-vuc.danh-sach')->with('success','Thêm Mới Thành Công');
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
        $linhVuc = LinhVuc::find($id);
        return view('linh-vuc.form',compact('linhVuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestLinhVuc $request, $id)
    {
        $linhVuc = LinhVuc::find($id);
        $linhVuc->ten_linh_vuc = $request->ten_linh_vuc;
        $linhVuc->save();

        return redirect()->route('linh-vuc.danh-sach')->with('success','Cập Nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linhVuc = LinhVuc::find($id);
        $cauHoi = CauHoi::where('linh_vuc_id',$id)->get()->each->delete();
        $linhVuc->delete();
        return redirect()->route('linh-vuc.danh-sach');
    }

    public function bin()
    {
        $deleteLV = LinhVuc::onlyTrashed()->get();
        return view('linh-vuc.bin',compact('deleteLV'));
    }

    public function restore($id)
    {
        LinhVuc::onlyTrashed()->where('id',$id)->restore();
        CauHoi::onlyTrashed()->where('linh_vuc_id',$id)->restore();
        return redirect()->route('linh-vuc.danh-sach');
    }
}
