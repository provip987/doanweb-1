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
            <th>giá</th>
            <td><input type="text" name="gia"/></td>
        </tr>

        
        <tr>
            <th>loại</th>
            <td><select name="loai" id="loai">
                 @foreach($dsLoai as $Loai)
                 <option value="{{$Loai->id}}"> {{$Loai->ten}}</option>
                 @endforeach
            </select></td>
        </tr>
        <tr>
            <th>số lượng</th>
            <td><input type="text" name="so_luong"/></td>
        </tr>

        <tr>
            <th>thêm hình ảnh</th>
            <th><input type="file" name="HinhAnh[]" multiple require="true"></th>
        </tr>
   
        <tr>
            <th>nhà cung cấp</th>
            <td><select name="ncc" id="ncc">
                 @foreach($dsNCC as $NCC)
                 <option value="{{$NCC->id}}"> {{$NCC->ten}}</option>
                 @endforeach
            </select></td>
        </tr>

        <tr>
            <th>thông tin</th>
            <td><input type="text" name="thong_tin"/></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Luu</button></td>
        </tr>
    </table>
</form>
@endsection   