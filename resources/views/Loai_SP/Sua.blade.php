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
<form method="POST"  enctype="multipart/form-data" action="{{ route('Loai.Sua', ['id' => $Loai->id ])}}">
   @csrf
    <table border=0>
        <tr>
            <th>Tên</th>
            <td><input type="text" name="Ten" value = "{{ $Loai->ten }}"/></td>
        </tr>
        <tr>
            <th>size_id</th>
            <td><input type="text" name="size_id" value = "{{ $Loai->size_id }}"/></td>
        </tr>
            <th></th>
            <td><button type="submit">Luu</button></td>
        </tr>
    </table>
</form>
@endsection   