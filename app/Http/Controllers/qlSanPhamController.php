<?php

namespace App\Http\Controllers;
use App\Models\san_pham;
use App\Models\hinh_anh;

use Illuminate\Http\Request;

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
        

        
        // dd($files);
        $dsSanPham->loai_san_pham=$rq->loai_san_pham;
        $dsSanPham->ten_san_pham=$rq->ten_san_pham;
        $dsSanPham->gia=$rq->gia;
        $dsSanPham->mo_ta=$rq->mo_ta;
        $dsSanPham->so_luong=$rq->so_luong;
        $dsSanPham->save();

        $files = $rq->hinh_anh;
        $hinhanh = new hinh_anh();
        $hinhanh->url = $files->store('Hinh_Anh'); // Lưu trữ trong thư mục storage/app/public/Hinh_Anh
        $hinhanh->san_pham_id = $dsSanPham->id;
        $hinhanh->save();
        
          
        return redirect()->route('hienthidsSanPham')->with('thong_bao', 'thành công');
        
    }
    public function capNhatSanPham(san_pham $id){

        return view('SanPham/cap-nhat-san-pham',['id'->$id]);

    }
    public function xuLyCapNhatSanPham(Request $request,$id){
        $dsKH =khach_hang ::find($id);
        $dsSanPham= san_pham::find($id);
        if($dsSanPham){

            $dsSanPham->loai_san_pham=$rq->loai_san_pham;
            $dsSanPham->ten_san_pham=$rq->ten_san_pham;
            $dsSanPham->gia=$rq->gia;
            $dsSanPham->mo_ta=$rq->mo_ta;
            $dsSanPham->so_luong=$rq->so_luong;
            $dsSanPham->save();

            $files = $rq->hinh_anh;
            $hinhanh = new hinh_anh();
            $hinhanh->url = $files->store('Hinh_Anh'); // Lưu trữ trong thư mục storage/app/public/Hinh_Anh
            $hinhanh->san_pham_id = $dsSanPham->id;
            $hinhanh->save();
        

        }
        return redirect()->route('hienthidsSanPham',['id'=>$dsSanPham,'id'=> $hinhanh]);

    }
       
}
