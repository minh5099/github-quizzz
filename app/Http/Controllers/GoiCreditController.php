<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoiCredit;
use App\Http\Requests\RequestGoiCredit;

class GoiCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listGoiCredit = GoiCredit::all();
        return view('goi-credit.danh-sach', compact('listGoiCredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goi-credit.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestGoiCredit $request)
    {
        $goiCredit = new GoiCredit;
        $goiCredit->ten_goi = $request->ten_goi;
        $goiCredit->credit = $request->credit;
        $goiCredit->so_tien = $request->so_tien;
        $goiCredit->save();

        return redirect()->route('goi-credit.danh-sach')->with('success','Thêm Mới Thành Công');
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
       $goiCredit = GoiCredit::find($id);
       return view('goi-credit.form',compact('goiCredit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestGoiCredit $request, $id)
    {
        $goiCredit = GoiCredit::find($id);
        $goiCredit->ten_goi = $request->ten_goi;
        $goiCredit->credit = $request->credit;
        $goiCredit->so_tien = $request->so_tien;
        $goiCredit->save();

        return redirect()->route('goi-credit.danh-sach')->with('success','Cập Nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goiCredit = GoiCredit::find($id);
        $goiCredit->delete();

        return redirect()->route('goi-credit.danh-sach');
    }

    public function bin()
    {
        $deleteGoi = GoiCredit::onlyTrashed()->get();
        return view('goi-credit.bin',compact('deleteGoi'));
    }

    public function restore($id)
    {
        GoiCredit::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('goi-credit.danh-sach');
    }
}
