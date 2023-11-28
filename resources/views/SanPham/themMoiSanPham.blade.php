@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">THÊM MỚI</h1>
      </div>
<form method="POST"  enctype="multipart/form-data" action="{{route('xulythemSP')}}">
   @csrf
    <table border=0>
        <tr>
            <th>Loại sản phẩm</th>
            <td><input type="text" name="loai_san_pham"/></td>
        </tr>
        <tr>
            <th>Tên sản phẩm</th>
            <td><input type="text" name="ten_san_pham"/></td>
        </tr>
        <tr> 
            <th>Giá</th>
            <td><input type="text" name="gia"/></td>
        </tr>
        <tr> 
            <th>Mô tả</th>
            <td><input type="text" name="mo_ta"/></td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td><input type="text" name="so_luong"/></td>
        </tr>
        <tr>
            <th>Hình ảnh</th>
            <th><input type="file" name="hinh_anh"  multiple require="true"></th>
        </tr>
        
       
        <tr>
            <th></th>
            <td><button type="submit">Luu</button></td>
        </tr>
    </table>
</form>
@endsection   