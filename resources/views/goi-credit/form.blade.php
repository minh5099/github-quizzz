@extends('layout')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($goiCredit)) Cập Nhật @else Thêm @endif Mới Gói Credit</h4>
                @if(isset($goiCredit))
                    <form action="{{ route('goi-credit.xu-ly-cap-nhat',['id' => $goiCredit->id]) }}" method="POST">
                @else
                    <form action="{{ route('goi-credit.xu-ly-them-moi') }}" method="POST">
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
                            <label for="ten_goi">Tên Gói</label>
                            <input type="text" class="form-control" id="ten_goi" name="ten_goi" placeholder="Tên Gói" @if(isset($goiCredit)) value="{{ $goiCredit->ten_goi }}" @endif>
                            @if($errors->has('ten_goi'))
                                <p class="text-danger">{{ $errors->first('ten_goi') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" class="form-control" id="credit" name="credit" placeholder="Credit" @if(isset($goiCredit)) value="{{ $goiCredit->credit }}" @endif>
                            @if($errors->has('credit'))
                                <p class="text-danger">{{ $errors->first('credit') }}</p>
                            @endif
                        </div>
                       <div class="form-group">
                            <label for="so_tien">Số Tiền</label>
                            <input type="text" class="form-control" id="so_tien" name="so_tien" placeholder="Số Tiền" @if(isset($goiCredit)) value="{{ $goiCredit->so_tien }}" @endif>
                            @if($errors->has('so_tien'))
                                <p class="text-danger">{{ $errors->first('so_tien') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($goiCredit)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection