<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khach_hang;
use App\Models\admin;
use App\Models\nha_cung_cap;

class NhaCungCapController extends Controller
{
    public function DanhSach()
    {
        $dsNCC=nha_cung_cap::all();
        return view('San-Pham/nha-cung-cap/danhsach',compact('dsNCC')) ;
    }
    function Them(Request $request)
    {
        if ($request->session()->has('logged_in'))
        {
            return view('San-Pham/nha-cung-cap/them');
    }
        else
        {
            return redirect()->route('DangNhap')->with('thong_bao', 'thành công');
        }
        
    }

    function XuLyThem(Request $rq)
    {
        $Them = new nha_cung_cap();
        $Them->ten = $rq->Ten;
        $Them->dia_chi=$rq->dia_chi;
        $Them->so_dien_thoai=$rq->so_dien_thoai;
        $Them->save();
        $dsNCC = nha_cung_cap::all();
        return view('San-Pham/nha-cung-cap/danhsach',compact('dsNCC'));
    }
}
