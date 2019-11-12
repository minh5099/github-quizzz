@extends('layout')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($cauHoi)) Cập Nhật @else Thêm @endif Mới Câu Hỏi</h4>
                @if(isset($cauHoi))
                    <form action="{{ route('cau-hoi.xu-ly-cap-nhat',['id' => $cauHoi->id]) }}" method="POST">
                @else
                    <form action="{{ route('cau-hoi.xu-ly-them-moi') }}" method="POST">
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
                            <label for="noi_dung">Nội Dung Câu Hỏi</label>
                            <input type="text" class="form-control" id="noi_dung" name="noi_dung" placeholder="Nội dung" @if(isset($cauHoi)) value="{{ $cauHoi->noi_dung }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="linh_vuc">Lĩnh Vực</label>
                            <select class="custom-select" id="linh_vuc" name="linh_vuc">
                                <option>--Chọn Lĩnh Vực--</option>
                                @foreach($listLinhVuc as $linhVuc)
                                <option @if(isset($cauHoi) && $linhVuc->id == $cauHoi->linh_vuc_id) selected @endif value="{{ $linhVuc->id }}"> {{ $linhVuc->ten_linh_vuc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phuong_an_a">Phương án a</label>
                            <input type="text" class="form-control" id="phuong_an_a" name="phuong_an_a" placeholder="Phương án a" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_a }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phuong_an_b">Phương án b</label>
                            <input type="text" class="form-control" id="phuong_an_b" name="phuong_an_b" placeholder="Phương án b" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_b }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phuong_an_c">Phương án c</label>
                            <input type="text" class="form-control" id="phuong_an_c" name="phuong_an_c" placeholder="Phương án c" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_c }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phuong_an_d">Phương án d</label>
                            <input type="text" class="form-control" id="phuong_an_d" name="phuong_an_d" placeholder="Phương án d" @if(isset($cauHoi)) value="{{ $cauHoi->phuong_an_d }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="dap_an">Đáp án</label>
                            <input type="text" class="form-control" id="dap_an" name="dap_an" @if(isset($cauHoi)) value="{{ $cauHoi->dap_an }}" @endif placeholder="đáp án">
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($cauHoi)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection