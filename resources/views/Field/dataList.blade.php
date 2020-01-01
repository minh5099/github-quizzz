@extends('layout')


@section('main-content')
<!-- TABLE HOVER -->
@if(\Session::has('success'))
<div class="alert alert-success">
<p>{{\Session::get('success')}}</p>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <!-- Model Insert Data -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsert">
                Add New Field
            </button>
            @csrf
                <div class="modal fade" id="modalInsert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create Field </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="{{action('FieldController@store')}}" method="POST">
                                @csrf
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="fieldName">Field</label>
                                        <input type="text" class="form-control" id="fieldName" name="fieldName" placeholder="Field Name" @if(isset($field)) value="{{ $field->fieldName }}" @endif>
                                    </div>
                                </div>

                                    <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Model Insert -->

                <!-- Start Model Edit -->
                <div class="modal fade" id="modalUpdate">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Update Field </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="/field" method="POST" id="updateForm">
                                @csrf
                                {{method_field('PUT')}}
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="fieldNameUP">Field</label>
                                        <input type="text" class="form-control" id="fieldNameUP" name="fieldNameUP" placeholder="Field Name" @if(isset($field)) value="{{ $field->fieldName }}" @endif>
                                    </div>
                                </div>

                                    <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Model Edit -->

                <!--List Data Field-->

                <h4 class="header-title mt-3  mb-3">List Field</h4>
                <table id="basic-datatable-1" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Field Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listField as $list)
                        <tr> 
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->ten_linh_vuc }}</td>
                            <td>
                               <a href=# class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                               <a href="#" class="btn btn-danger waves-effect waves-light" onclick="return confirm('Do You Want Delete?')"><i class="fas fa-trash"></i></a>
                           </td>                           
                       </tr>
                       @endforeach
                   </tbody>
               </table>

            </div>
        </div>
    </div>
</div>
        <!-- Loading Field List  -->

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
         $(document).ready(function()
            {$("#basic-datatable-1").DataTable({
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