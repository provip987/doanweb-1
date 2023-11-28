@extends('Index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('bootstrap-5.2.3-dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">LOẠI SẢN PHẨM</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="{{ route('Loai.them') }}" type="button" class="btn btn-sm btn-outline-secondary" >Thêm mới</a>
            
          </div>
          
        </div>
      </div>

<table class="table table-striped table-sm">
<tr>
                    <th scope="col">ID</th>
                    <th scope="col">Phieu nhap</th>
                    <th scope="col">San pham</th>
                    <th scope="col">So luong</th>
                    <th scope="col">Gia nhap</th>
                    <th scope="col">Gia ban</th>
                    <th scope="col">Thành tiền</th>

                </tr>
    @forelse($DsPhieuNhap as $ds)
    <tr>
       
        <td>{{ $ds->id }}</td>
    
    <tr>
    @empty
        <tr>
            <td colspan=3>không có dử liệu</td>
        </tr>
    @endforelse
  
</table>

@endsection     



   

