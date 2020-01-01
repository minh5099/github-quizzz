@extends('layout')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($nguoiChoi)) Cập Nhật @else Thêm @endif Mới Người Chơi</h4>
                @if(isset($nguoiChoi))
                    <form action="{{ route('nguoi-choi.xu-ly-cap-nhat',['id' => $nguoiChoi->id]) }}" method="POST">
                @else
                    <form action="{{ route('nguoi-choi.xu-ly-them-moi') }}" method="POST">
                @endif
                        @csrf
                        <!--@if(count($errors)>0)
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class="alert alert-danger">
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>    
                        @endif-->
                        <div class="form-group">
                            <label for="ten_dang_nhap">Tên Đăng Nhập</label>
                            <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên Đăng Nhập" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->ten_dang_nhap }}" @endif>
                            @if($errors->has('ten_dang_nhap'))
                                <p class="text-danger">{{ $errors->first('ten_dang_nhap') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mat_khau">Mật Khẩu</label>
                            <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật Khẩu" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->mat_khau }}" @endif>
                            @if($errors->has('mat_khau'))
                                <p class="text-danger">{{ $errors->first('mat_khau') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input type="text" class="form-control" id="mail" name="mail" placeholder="Email" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->mail }}" @endif>
                            @if($errors->has('mail'))
                                <p class="text-danger">{{ $errors->first('mail') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="hinh_dai_dien">Hình Đại Diện</label>
                            <input type="text" class="form-control" id="hinh_dai_dien" name="hinh_dai_dien" placeholder="Hình Đại Diện" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->hinh_dai_dien }}" @endif>
                            @if($errors->has('hinh_dai_dien'))
                                <p class="text-danger">{{ $errors->first('hinh_dai_dien') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="diem_cao_nhat">Điểm Cao Nhất</label>
                            <input type="text" class="form-control" id="diem_cao_nhat" name="diem_cao_nhat" placeholder="Điểm Cao Nhất" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->diem_cao_nhat }}" @endif>
                            @if($errors->has('diem_cao_nhat'))
                                <p class="text-danger">{{ $errors->first('diem_cao_nhat') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" class="form-control" id="credit" name="credit" placeholder="Credit" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->credit }}" @endif>
                            @if($errors->has('credit'))
                                <p class="text-danger">{{ $errors->first('credit') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($nguoiChoi)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection