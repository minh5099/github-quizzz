<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanTriVien;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestQuanTriVien;
use DB;
use Validator;

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
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),
            [
                'email' => 'required|unique:quan_tri_viens|min:5|email|max:32',
                'ho_ten' => 'required|min:5|max:32',
                'password' => 'required|min:8|max:32',
            ],
            [
                'email.required' => 'Email Không Được Bỏ Trống',
                'email.unique' => 'Email Đã Tồn Tại',
                'email.min' => 'Email ít nhất 5 kí tự và ít hơn 32 kí tự',
                'email.max' => 'Email ít nhất 5 kí tự và ít hơn 32 kí tự',
                'email.email' => 'Không đúng định dạng',
                'ho_ten.required' => 'Nhập Họ Tên Tên',
                'ho_ten.min' => 'Họ Tên ít nhất 5 kí tự và ít hơn 32 kí tự',
                'ho_ten.max' => 'Họ Tên ít nhất 5 kí tự và ít hơn 32 kí tự',
                'password.required' => 'Nhập Mật Khẩu',
                'password.min' => 'Mật Khẩu ít nhất 8 kí tự và ít hơn 32 kí tự',
                'password.max' => 'Mật Khẩu ít nhất 8 kí tự và ít hơn 32 kí tự'

            ]);
        if($validator->passes())
        {
            $quanTriVien = new QuanTriVien();
            $quanTriVien->email = $request->email;
            $quanTriVien->ho_ten = $request->ho_ten;
            $quanTriVien->password = bcrypt($request->password);
            $quanTriVien->save();
            return response()->json(['success'=>'Thêm Mới Thành Công.']);
        }
        else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|unique:quan_tri_viens|min:5|email|max:32',
                'ho_ten' => 'required|min:5|max:32',
                'password' => 'required|min:8|max:32',
            ],
            [
                'email.required' => 'Email Không Được Bỏ Trống',
                'email.unique' => 'Email Đã Tồn Tại',
                'email.min' => 'Email ít nhất 5 kí tự và ít hơn 32 kí tự',
                'email.max' => 'Email ít nhất 5 kí tự và ít hơn 32 kí tự',
                'email.email' => 'Không đúng định dạng',
                'ho_ten.required' => 'Nhập Họ Tên Tên',
                'ho_ten.min' => 'Họ Tên ít nhất 5 kí tự và ít hơn 32 kí tự',
                'ho_ten.max' => 'Họ Tên ít nhất 5 kí tự và ít hơn 32 kí tự',
                'password.required' => 'Nhập Mật Khẩu',
                'password.min' => 'Mật Khẩu ít nhất 8 kí tự và ít hơn 32 kí tự',
                'password.max' => 'Mật Khẩu ít nhất 8 kí tự và ít hơn 32 kí tự'

            ]);
        if($validator->passes())
        {
            $quanTriVien = QuanTriVien::find($id);
            $quanTriVien->email = $request->email;
            $quanTriVien->ho_ten = $request->ho_ten;
            $quanTriVien->password = bcrypt($request->password);
            $quanTriVien->save();
            return response()->json(['success'=>'Cập Nhật Thành Công.']);
        }
        else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
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

    //Function data has softDeletes
    public function bin()
    {
        $deleteQTV = QuanTriVien::onlyTrashed()->get();
        return view('quan-tri-vien.bin',compact('deleteQTV'));
    }

    public function restore($id)
    {
        QuanTriVien::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('quan-tri-vien.danh-sach');
    }

    //public function delData($id)
    //{
    //    DB::table('quan_tri_viens')->where('id',$id)->delete();
    //    return view('quan-tri-vien.bin');
    //}

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email,'password'=>$request->password]))
        {
            return redirect('/');
        }
        else
        {
            return redirect("admin/dangnhap")->with('thongbao','Đăng Nhập Thất Bại');
        }
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

}
