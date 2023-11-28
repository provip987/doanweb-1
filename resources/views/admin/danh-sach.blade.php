@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DANH SÁCH NHÂN VIÊN</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
         
          
        </div>
      </div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Họ Tên</th>
        <th>Địa Chỉ</th>
        <th>Số điện thoại</th>
        <th>tên tài khoản</th>
        <th>mật khẩu</th>
        <th>quyền</th>
       
    </tr>
    @forelse($dsNV as $dsNV)
    <tr>
       
        <td>{{ $dsNV->id }}</td>
        <td>{{ $dsNV->ten }}</td>
        <td>{{ $dsNV->dia_chi }}</td>
        <td>{{ $dsNV->so_dien_thoai }}</td>
        <td>{{ $dsNV->ten_dang_nhap }}</td>
        <td>{{ $dsNV->password }}</td>
        <td>{{ $dsNV->quyen->ten }}</td>
        
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