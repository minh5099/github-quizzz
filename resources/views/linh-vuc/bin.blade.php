@extends('layout')


@section('main-content')
<!-- TABLE HOVER -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-3 mb-3">Danh Sách Lĩnh Vực Đã Xóa</h4>
                <table id="basic-datatable-1" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Lĩnh Vực</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($deleteLV as $linhVuc)
                        <tr> 
                            <td>{{ $linhVuc->id }}</td>
                            <td>{{ $linhVuc->ten_linh_vuc }}</td>
                            <td>
                                <a href="{{ route('linh-vuc.restore',$linhVuc->id) }}" class="btn btn-info waves-effect waves-light"><i class="fas fa-trash-restore"></i></a>
                                <!--<a href="{{ route('linh-vuc.delDt', ['id' => $linhVuc->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="fas fa-trash"></i></a>-->
                            </td>                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
<!-- END TABLE HOVER -->
@endsection('main-content')

@section('css')
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection('css')

@section('js')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script type="text/javascript">
    $(document).ready(function(){$("#basic-datatable-1").DataTable({
        language:{paginate:{
            previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"
        }
    },
    drawCallback:function()
  {$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
}
});
});
</script>
@endsection('js')