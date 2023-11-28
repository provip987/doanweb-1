@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">THÊM MỚI</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="them-moi" type="button" class="btn btn-sm btn-outline-secondary" >Thêm mới</a>
            
          </div>
          
        </div>
      </div>
<form method="POST"  enctype="multipart/form-data" action="{{ route('sanpham.Sua', ['id' => $SanPham->id ])}}">
   @csrf
    <table border=0>
        <tr>
            <th>Tên</th>
            <td><input type="text" name="Ten" value = "{{ $SanPham->ten }}"/></td>
        </tr>
        <tr>
            <th>giá</th>
            <td><input type="text" name="gia" value = "{{ $SanPham->gia }}"/></td>
        </tr>

        
        <tr>
            <th>loại</th>
            <td><select name="loai" id="loai" value = "{{ $SanPham->loai->ten }}">
                 @foreach($dsLoai as $dsl)
                 <option value="{{$dsl->id}}"> {{$dsl->ten}}</option>
                 @endforeach
            </select></td>
        </tr>


       
        <tr>
            <th>thêm hình ảnh</th>
            <th><input type="file" name="HinhAnh[]" multiple require="true"></th>
        </tr>
        <tr>
            <th>số lượng</th>
            <td><input type="text" name="so_luong" value = "{{ $SanPham->so_luong }}"/></td>
        </tr>
        <tr>
            <th>thông tin</th>
            <td><input type="text" name="thong_tin" value = "{{ $SanPham->thong_tin }}"/></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Luu</button></td>
        </tr>
    </table>
</form>
@endsection   