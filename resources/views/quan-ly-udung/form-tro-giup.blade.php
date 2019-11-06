@extends('layou')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($cauHinhTroGiup)) Cập Nhật @else Thêm @endif Mới Cấu Hình Trợ Giúp</h4>
                @if(isset($cauHinhTroGiup))
                    <form action="{{ route('tro-giup.xu-ly-cap-nhat',['id' => $cauHinhTroGiup->id]) }}" method="POST">
                @else
                    <form action="{{ route('tro-giup.xu-ly-them-moi') }}" method="POST">
                @endif
                        @csrf
                        <div class="form-group">
                            <label for="loai_tro_giup">Loại Trợ Giúp</label>
                            <input type="text" class="form-control" id="loai_tro_giup" name="loai_tro_giup" placeholder="Loại Trợ Giúp" @if(isset($cauHinhTroGiup)) value="{{ $cauHinhTroGiup->loai_tro_giup }}" @endif>
                        </div>
                       <div class="form-group">
                            <label for="thu_tu">Thứ Tự</label>
                            <input type="text" class="form-control" id="thu_tu" name="thu_tu" placeholder="Thứ Tự" @if(isset($cauHinhTroGiup)) value="{{ $cauHinhTroGiup->thu_tu }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="credit">Giá Credit Mua Trợ Giúp</label>
                            <input type="text" class="form-control" id="credit" name="credit" placeholder="Credit" @if(isset($cauHinhTroGiup)) value="{{ $cauHinhTroGiup->credit }}" @endif>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($cauHinhTroGiup)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection