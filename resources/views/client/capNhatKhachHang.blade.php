@extends('Index')
@section('content')
<form action="{{route('xulycapnhatkhachhang',['id'=>$id->id])}}" method="POST" enctype="multipart/form-data">
@csrf
@method ('Put')
<div class="form-group">
    <label for="exampleInputEmail1">Ten  </label>
    <input type="text" class="form-control" name="ten" value ="{{$id->ten}}"aria-describedby="emailHelp" placeholder="Nhập tên ">
 </div>

 <div class="form-group">
    <label for="exampleInputEmail1">Ten dang nhap </label>
    <input type="text" class="form-control" name="ten_dang_nhap"  value ="{{$id->ten_dang_nhap}}" aria-describedby="emailHelp" placeholder="Nhập tên đăng nhập">
 </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" value ="{{$id->password}}" placeholder="Nhập mật khẩu">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" value ="{{$id->email}}" placeholder="Nhập email">
    <small name="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">So dien thoai</label>
    <input type="number" class="form-control" name="sdt" value ="{{$id->sdt}}" placeholder="Nhập số điện thoại">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Dia chi</label>
    <input type="text" class="form-control" name="dia_chi" value ="{{$id->dia_chi}}" placeholder="Nhập địa chỉ">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Quyen</label>
    <input type="text" class="form-control" name="quyen" value ="{{$id->quyen}}" placeholder="Nhập quyền">
  </div>

 
  
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection 