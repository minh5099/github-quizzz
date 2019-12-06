@extends('layout')

@section('main-content')
<div class="row">
    <div class="col-lg-6"> 
        <div class="card" style="margin-left: 100px ;width: 1170px">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($quanTriVien)) Cập Nhật @else Thêm @endif Mới Nhân Viên Quản Trị</h4>
                @if(isset($quanTriVien))
                    <form action="{{ route('quan-tri-vien.xu-ly-cap-nhat',['id' => $quanTriVien->id]) }}" method="POST" id="useForm">
                @else
                    <form action="{{ route('quan-tri-vien.xu-ly-them-moi') }}" method="POST" id="useForm">
                @endif
                        @csrf
                        <div class="text-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <!--@if(count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif-->
                        <div class="form-group">
                            <label for="email">Tên Đăng Nhập</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Tên Đăng Nhập" @if(isset($quanTriVien)) value="{{ $quanTriVien->email }}" @endif autofocus>
                            
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu</label>
                            <input  class="form-control" id="password" name="password" placeholder="Mật Khẩu" @if(isset($quanTriVien)) value="{{ $quanTriVien->password }}" @endif>
                        </div>
                       <div class="form-group">
                            <label for="ho_ten">Họ Tên</label>
                            <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Họ Tên" @if(isset($quanTriVien)) value="{{ $quanTriVien->ho_ten }}" @endif>
                            <p style="color:red; display: none" id="errorHoTen"></p>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-submit">@if(isset($quanTriVien)) Cập Nhật @else Thêm Mới @endif</button>
                    </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>
@endsection
@section('js')
<!--<script>
    (function(){
    document.querySelector('#useForm').addEvenListener('submit',function(e){
        e.preventDefault()

        axios.post(this.action,{
            'email':document.querySelector('#email').value,
            'password':document.querySelector('#password').value,
            'ho_ten':document.querySelector('#ho_ten').value
        })
        .then((response)=>{
            this.reset();
            this.insertAdjacenHTMl('afterend',`<div class="alert alert-success">User Created Success</div>`)
            document.getElementById('success').scrollIntoView();
        })
        .catch((error)=>{
            const errors = error.response.data.errors
            const firstItem = Object.keys(errors)[0]
            const firstItemDom = document.getElementById(firstItem)
            const firstErrorMessage = errors[firstItem][0]

            // scroll to be the error message
            firstItemDom.scrollIntoView()

            //remove all error messages 
            const errorMessages = document.querySelectorAll('.text-danger')
            errorMessages.forEach((element) => element.textContent = '')

            //show the error messages
            

            // Remove all from controls with highlighted error textbox

            //Highlight the form control with the error
        });
    })();
</script>-->
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();
            var ho_ten = $("input[name='ho_ten']").val();


            $.ajax({
                url: "/quan-tri-vien/them-moi",
                type:'POST',
                data: {_token:_token, email:email, password:password,ho_ten:ho_ten},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                        $("#email").val("");
                        $("#password").val("");
                        $("#ho_ten").val("");
                        const errorMessages = document.querySelectorAll('.print-error-msg');
                        errorMessages.forEach((element) => element.textContent = '');
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });


        }); 


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
            

        }
    });
</script>
@endsection