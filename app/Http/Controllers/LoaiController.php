<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai;
use App\Models\san_pham;
use App\Models\hinh_anh;
class LoaiController extends Controller
{
    function DanhSachLoai(Request $request)
    {
            $DsLoai = loai::all();
        return view('Loai_SP/danh-sach',compact('DsLoai'));
        
    }

    function Them(Request $request)
    {
        if ($request->session()->has('logged_in'))
        {
            return view('Loai_SP/them');
}
        else
        {
            return redirect()->route('DangNhap')->with('thong_bao', 'thành công');
        }
        
    }

    function XuLyThem(Request $rq)
    {
        $Loai = new loai();
        $Loai->ten = $rq->Ten;
        $Loai->size_id = $rq->size_id;

        $Loai->save();
        $DsLoai = loai::all();
        return view('Loai_SP/danh-sach',compact('DsLoai'));
    }

    function Sua($id,Request $request)
    {
        if ($request->session()->has('logged_in'))
        {
            $Loai = loai::find($id);
        return view('Loai_SP/Sua',compact('Loai'));
}
        else
        {
            return redirect()->route('DangNhap')->with('thong_bao', 'thành công');
        }
        
    }

    function XuLySua(Request $rq,$id)
    {
        $Loai = loai::find($id);
        if($Loai)
        {
            $Loai->ten = $rq->Ten;
            $Loai->size_id = $rq->size_id;

            $Loai->save();
        }
        $DsLoai = loai::all();
        return view('Loai_SP/danh-sach',compact('DsLoai'));
    }

    function XuLyXoa($id)
    {
        $Loai = loai::find($id);
        $Loai->delete();
        $DsLoai = loai::all();
        return view('Loai_SP/danh-sach',compact('DsLoai'));
    }
}
