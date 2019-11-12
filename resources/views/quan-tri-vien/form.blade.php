@extends('layout')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($quanTriVien)) Cập Nhật @else Thêm @endif Mới Nhân Viên Quản Trị</h4>
                @if(isset($quanTriVien))
                    <form action="{{ route('quan-tri-vien.xu-ly-cap-nhat',['id' => $quanTriVien->id]) }}" method="POST">
                @else
                    <form action="{{ route('quan-tri-vien.xu-ly-them-moi') }}" method="POST">
                @endif
                        @csrf
                        @if(count($errors)>0)
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class="alert alert-danger">
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>    
                        @endif
                        <div class="form-group">
                            <label for="ten_dang_nhap">Tên Đăng Nhập</label>
                            <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên Đăng Nhập" @if(isset($quanTriVien)) value="{{ $quanTriVien->ten_dang_nhap }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="mat_khau">Mật Khẩu</label>
                            <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật Khẩu" @if(isset($quanTriVien)) value="{{ $quanTriVien->mat_khau }}" @endif>
                        </div>
                       <div class="form-group">
                            <label for="ho_ten">Họ Tên</label>
                            <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Họ Tên" @if(isset($quanTriVien)) value="{{ $quanTriVien->ho_ten }}" @endif>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($quanTriVien)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection