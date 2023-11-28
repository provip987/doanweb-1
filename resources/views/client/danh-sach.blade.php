@extends('Index')
@section('content')



<head>
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH KHÁCH HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('themkhachhang') }}" type="button" class="btn btn-sm btn-outline-secondary">Thêm mới</a>




        </div>

    </div>
</div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Tên</th>
        <th>Ten dang nhap</th>
        <th>mật khẩu</th>
        <th>email</th>
        <th>Số điện thoại</th>
        <th>Địa Chỉ</th>
        <th>quyền</th>
        <th>Thao tac</th>
    </tr>
    @forelse($dsKH as $KH)
    <tr>

        <td>{{ $KH->id }}</td>
        <td>{{ $KH->ten }}</td>
        <td>{{ $KH->ten_dang_nhap }}</td>
        <td>{{ $KH->password }}</td>
        <td>{{ $KH->email }}</td>
        <td>{{ $KH->sdt }}</td>
        <td>{{ $KH->dia_chi }}</td>
        <td>{{ $KH->quyen->ten }}</td>
        <td>
            <form action="{{route('xoakhachhang',$KH->id)}}" method="POST">
                <input type="hidden" name="MaKh" value="{{$KH->id}}">

                <a href="{{route('xulycapnhatkhachhang',$KH->id)}}" class="btn btn-info">Cap nhat</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Delete</button>
            </form>

        </td>

    <tr>
        @empty
    <tr>
        <td colspan=6>không có dử liệu</td>
    </tr>
    @endforelse

</table>

@endsection


@section('page')
@if(session('thong_bao'))
<script>Swal.fire("{{ session('thong_bao') }}")</script>
@endif
@endsection