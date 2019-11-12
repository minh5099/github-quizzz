@extends('layout')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($quanLyDiemHoi)) Cập Nhật @else Thêm @endif Mới Cấu Hình App</h4>
                @if(isset($quanLyDiemHoi))
                    <form action="{{ route('diem-hoi.xu-ly-cap-nhat',['id' => $quanLyDiemHoi->id]) }}" method="POST">
                @else
                    <form action="{{ route('diem-hoi.xu-ly-them-moi') }}" method="POST">
                @endif
                        @csrf
                        <div class="form-group">
                            <label for="thu_tu">Thứ Tự</label>
                            <input type="text" class="form-control" id="thu_tu" name="thu_tu" placeholder="Thứ Tự" @if(isset($quanLyDiemHoi)) value="{{ $quanLyDiemHoi->thu_tu }}" @endif>
                        </div>
                       <div class="form-group">
                            <label for="diem">Điểm Câu Hỏi</label>
                            <input type="text" class="form-control" id="diem" name="diem" placeholder="Điểm" @if(isset($quanLyDiemHoi)) value="{{ $quanLyDiemHoi->diem }}" @endif>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($quanLyDiemHoi)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection