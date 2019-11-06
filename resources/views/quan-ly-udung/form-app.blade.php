@extends('layou')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($cauHinhApp)) Cập Nhật @else Thêm @endif Mới Cấu Hình App</h4>
                @if(isset($cauHinhApp))
                    <form action="{{ route('app.xu-ly-cap-nhat',['id' => $cauHinhApp->id]) }}" method="POST">
                @else
                    <form action="{{ route('app.xu-ly-them-moi') }}" method="POST">
                @endif
                        @csrf
                        <div class="form-group">
                            <label for="co_hoi_sai">Cơ Hội Sai</label>
                            <input type="text" class="form-control" id="co_hoi_sai" name="co_hoi_sai" placeholder="Cơ Hội Sai" @if(isset($cauHinhApp)) value="{{ $cauHinhApp->co_hoi_sai }}" @endif>
                        </div>
                       <div class="form-group">
                            <label for="thoi_gian_tra_loi">Thời Gian Trả Lời</label>
                            <input type="text" class="form-control" id="thoi_gian_tra_loi" name="thoi_gian_tra_loi" placeholder="Thời gian trả lời" @if(isset($cauHinhApp)) value="{{ $cauHinhApp->thoi_gian_tra_loi }}" @endif>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($cauHinhApp)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection