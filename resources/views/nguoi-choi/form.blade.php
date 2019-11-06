@extends('layou')

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
                        <div class="form-group">
                            <label for="ten_dang_nhap">Tên Đăng Nhập</label>
                            <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên Đăng Nhập" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->ten_dang_nhap }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="mat_khau">Mật Khẩu</label>
                            <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật Khẩu" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->mat_khau }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input type="text" class="form-control" id="mail" name="mail" placeholder="Email" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->mail }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="hinh_dai_dien">Hình Đại Diện</label>
                            <input type="text" class="form-control" id="hinh_dai_dien" name="hinh_dai_dien" placeholder="Hình Đại Diện" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->hinh_dai_dien }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="diem_cao_nhat">Điểm Cao Nhất</label>
                            <input type="text" class="form-control" id="diem_cao_nhat" name="diem_cao_nhat" placeholder="Điểm Cao Nhất" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->diem_cao_nhat }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" class="form-control" id="credit" name="credit" placeholder="Credit" @if(isset($nguoiChoi)) value="{{ $nguoiChoi->credit }}" @endif>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($nguoiChoi)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection