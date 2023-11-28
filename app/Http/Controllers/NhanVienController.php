<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\admin;
class NhanVienController extends Controller
{
    public function DSNV()
    {
        $dsNV= admin::all();
        return view('admin/danh-sach',compact('dsNV'));
    }
    public function themnv(){
        return view('admin/them');
    }
    public function xulythemnv(Request $request){
        $dsKH= new admin ();

        $dsKH->ten=$request->ten;
        $dsKH->ten_dang_nhap=$request->ten_dang_nhap;
        $dsKH->password=$request->password;
        $dsKH->email=$request->email;
        $dsKH->quyen_id=$request->quyen_id;
        $dsKH->so_dien_thoai=$request->so_dien_thoai;
        $dsKH->dia_chi=$request->dia_chi;
     

        $dsKH->save();
        return redirect()->route('DSNV')->with('thong_bao', 'THÊM THÀNH CÔNG');
    }
    function XuLyXoa($id)
    {
        $dsNV = admin::find($id);
        $dsNV->delete();
        $dsNV = admin::all();
        // return view('admin/danh-sach',compact('dsNV'));
        return redirect()->route('DSNV')->with('thong_bao', 'xoá THÀNH CÔNG');
    }
}
