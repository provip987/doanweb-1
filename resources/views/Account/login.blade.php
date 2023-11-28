<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3-dist/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3-dist/js/bootstrap.min.js')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <Style>
      body{
    background: url('{{ asset("Hinh_Anh/2.jpg") }}');
    background-size: cover;
    background-position-y: -80px;
    font-size: 16px;
}
#wrapper{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
#form-login{
    max-width: 400px;
    background: rgba(0, 0, 0 , 0.8);
    flex-grow: 1;
    padding: 30px 30px 40px;
    box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
}
.form-heading{
    font-size: 25px;
    color: #f5f5f5;
    text-align: center;
    margin-bottom: 30px;
}
.form-group{
    border-bottom: 1px solid #fff;
    margin-top: 15px;
    margin-bottom: 20px;
    display: flex;
}
.form-group i{
    color: #fff;
    font-size: 14px;
    padding-top: 5px;
    padding-right: 10px;
}
.form-input{
    background: transparent;
    border: 0;
    outline: 0;
    color: #f5f5f5;
    flex-grow: 1;
}
.form-input::placeholder{
    color: #f5f5f5;
}
#eye i{
    padding-right: 0;
    cursor: pointer;
}
 
.form-submit{
    background: transparent;
    border: 1px solid #f5f5f5;
    color: #fff;
    width: 100%;
    text-transform: uppercase;
    padding: 6px 10px;
    transition: 0.25s ease-in-out;
    margin-top: 30px;
}
.form-submit:hover{
    border: 1px solid #54a0ff;
}
    </Style>
</head>
<body>  
    <div id="wrapper">
        <form action="{{route('XLDangNhap')}}" id="form-login" method="post">
        @csrf       
            <h1 class="form-heading">Form đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="ten_dang_nhap" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>=
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
            <a href="{{route('Dangky')}}">Đăng ký tài khoản</a>
        </form>
    </div>
     
</body>

</html>
@if(session('thong_bao'))
        <script>Swal.fire("{{ session('thong_bao') }}")</script>
@endif
