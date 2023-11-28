@extends('index')
@section('content')

<head>
    <style>
        .AnhSP{
            width: 60em;
            margin: 3em 5em;
        }
    </style>
</head>
<body>
@csrf
    @foreach($dsAnh as $item)
        <img src="{{ asset($item->url) }}"  class="AnhSP"/>
        <button><a href="{{ route('sanpham.xuLyXoaAnh', ['id' => $item->id ])}}">Xoá</a></button>
        
    @endforeach
</div>
</body>

@endsection