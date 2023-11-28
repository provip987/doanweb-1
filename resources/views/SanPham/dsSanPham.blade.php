@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('themsanpham')}}" type="button" class="btn btn-sm btn-outline-secondary">Thêm mới</a>

        </div>

    </div>
</div>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</td>
        <th>Loại sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Mô tả </th>
        <th>Số Lượng</th>
        <th>Hình ảnh</th>
        <th>Thao tác</th>
    </tr>
    @forelse( $dsSanPham as $Sp)
    <tr>
        <td>{{$Sp->id}}</td>
        <td>{{$Sp->loai_san_pham}}</td>
        <td>{{$Sp->ten_san_pham}}</td>
        <td>{{$Sp->gia}}</td>
        <td>{{$Sp->mo_ta}}</td>
        <td>{{$Sp->so_luong}}</td>
        <td>
            @foreach($hinhanh as $image)
            @if($image->san_pham_id == $Sp->id)
            <img src="{{ asset($image->url) }}"style="width: 100px; height: 50px alt=Hình ảnh sản phẩm">
           
            @endif
            @endforeach
        </td>

        <td>
            <a href="{{route(''}}" class="btn btn-info">Cap nhat</a>
            <a href="" class="btn btn-success">Xoa</a>
        </td>

    <tr>
        @empty
    <tr>
        <td colspan=6>không có dử liệu</td>
    </tr>
    @endforelse


</table>

@endsection