<?php

namespace App\Http\Controllers;
use App\Models\sanpham;
use Illuminate\Http\Request;

class APISanPhamController extends Controller
{
    public function layDanhSach(){
        $dsSanPham= sanpham::all();
        return response()->json([
        'success'   =>true,
        'data'=>$dsSanPham
        ]);
    }
    public function chitietsanpham($id){
        $sanPham=sanpham::find($id);
        if(empty( $sanPham)){
            return response()->json([
                'success'   =>false,
                'message'=>"San pham id {$id} khong ton tai"
                ]);
        }
        return response()->json([
            'success'   =>true,
            'data'=>$sanPham
            ]);

    }
}
