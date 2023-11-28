@extends('index')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">THÊM MỚI</h1>
        
      </div>
<form method="POST"  enctype="multipart/form-data" action="">
   @csrf
    <table border=0>
        <tr>
            <th>Tên loại</th>
            <td><input type="text" name="Ten"/></td>
        </tr>
        <tr>
            <th>size_id</th>
            <td><input type="text" name="size_id"/></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Luu</button></td>
        </tr>
    </table>
</form>
@endsection   