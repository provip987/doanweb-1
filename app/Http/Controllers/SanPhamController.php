<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\hinh_anh;

class SanPhamController extends Controller
{
    public function showSanPham(){
        $dsSanPham = san_pham::with('hinh_anh')->get();
        $hinhanh= hinh_anh::all();
       
       
        return view('SanPham/dsSanPham',compact('dsSanPham','hinhanh'));
    }
    public function themSanPham(){
        return view('SanPham/themMoiSanPham');
    }
    public function xulyThemSanPham(Request $rq){
        $dsSanPham =new san_pham;
        

        $files = $rq->hinh_anh;
        // dd($files);
        $dsSanPham->loai_san_pham=$rq->loai_san_pham;
        $dsSanPham->ten_san_pham=$rq->ten_san_pham;
        $dsSanPham->gia=$rq->gia;
        $dsSanPham->mo_ta=$rq->mo_ta;
        $dsSanPham->so_luong=$rq->so_luong;
        $dsSanPham->save();

       
      
        $hinhanh = new hinh_anh();
        
        $hinhanh->url = $files->store('Hinh_Anh'); // Lưu trữ trong thư mục storage/app/public/Hinh_Anh
        $hinhanh->san_pham_id = $dsSanPham->id;
        $hinhanh->save();
        
          
        return redirect()->route('hienthidsSanPham')->with('thong_bao', 'thành công');
        
    }
}
