@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('sanpham.them') }}" type="button" class="btn btn-sm btn-outline-secondary" >Thêm mới</a>
            
          </div>
          
        </div>
      </div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Tên</th>
        <th>Loại</th>
        <th>Giá</th>
        <th>Số Lượng</th>
     
        <th>nhà cung cấp </th>
        <th>thông tin</th>
        <th>hình ảnh</th>
       
        <th></th>
    </tr>
    @forelse($dsSanPham as $SanPham)
    <tr>
       
        <td>{{ $SanPham->id }}</td>
        <td>{{ $SanPham->ten_san_pham }}</td>

        <td>{{ $SanPham->gia }}</td>
        <td>{{ $SanPham->so_luong }}</td>

        <td>{{ $SanPham->thong_tin }}</td>
        <td><a  href="{{ route('sanpham.HinhAnh', ['id' => $SanPham->id ])}}">xem ảnh sản phẩm</a> </td>
        <td>
            <a href="{{ route('sanpham.Sua', ['id' => $SanPham->id ])}}">Sửa</a> | <a href="{{ route('sanpham.xuLyXoa', ['id' => $SanPham->id ])}}">Xoá</a>
            
        </td>
        
    <tr>
    @empty
        <tr>
            <td colspan=6>không có dử liệu</td>
        </tr>
    @endforelse
    
</table>

@endsection     
@if(session('thong_bao'))

    @section('page')
        <script>Swal.fire("{{ session('thong_bao') }}")</script>
    @endsection

@endif