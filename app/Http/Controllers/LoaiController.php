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
     
            return view('Loai_SP/them');
    }

    function XuLyThem(Request $rq)
    {
        $Loai = new loai();
        $Loai->ten = $rq->Ten;
        $Loai->size_id = $rq->size_id;

        $Loai->save();
        $DsLoai = loai::all();
        // return view('Loai_SP/danh-sach',compact('DsLoai'));
        return redirect()->route('Loai.DanhSach')->with('thong_bao', 'Thêm THÀNH CÔNG');
    }

    function Sua($id,Request $request)
    {
        
       $Loai = loai::find($id);
        return view('Loai_SP/Sua',compact('Loai'));
       
        
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
