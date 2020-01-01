@extends('layout')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($linhVuc)) Cập Nhật @else Thêm @endif Mới Lĩnh Vực</h4>
                @if(isset($linhVuc))
                    <form action="{{ route('linh-vuc.xu-ly-cap-nhat',['id' => $linhVuc->id]) }}" method="POST">
                @else
                    <form action="{{ route('linh-vuc.xu-ly-them-moi') }}" method="POST">
                @endif
                        @csrf
                        <!--
                        @if(count($errors)>0)
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class="alert alert-danger">
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>    
                        @endif -->
                        <div class="form-group">
                            <label for="ten_linh_vuc">Lĩnh Vực</label>
                            <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Lĩnh Vực" @if(isset($linhVuc)) value="{{ $linhVuc->ten_linh_vuc }}" @endif>
                            @if($errors->has('ten_linh_vuc'))
                                <p class="text-danger">{{$errors->first('ten_linh_vuc')}}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($linhVuc)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection