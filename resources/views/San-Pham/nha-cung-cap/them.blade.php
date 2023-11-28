@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">THÊM MỚI</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('sanpham.them') }}" type="button" class="btn btn-sm btn-outline-secondary" >Thêm mới</a>
            
          </div>
          
        </div>
      </div>
<form method="POST"  enctype="multipart/form-data" action="">
   @csrf
    <table border=0>
        <tr>
            <th>Tên</th>
            <td><input type="text" name="Ten"/></td>
        </tr>
        <tr>
            <th>dia chi</th>
            <td><input type="text" name="dia_chi"/></td>
        </tr>
        <tr>
            <th>so dien thoai</th>
            <td><input type="text" name="so_dien_thoai"/></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Luu</button></td>
        </tr>
    </table>
</form>
@endsection   