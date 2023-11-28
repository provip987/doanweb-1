<?php

namespace App\Http\Controllers;
use App\Models\loai;

use Illuminate\Http\Request;

class APILoaiSanPhamController extends Controller
{
    public function layDanhSach(){
        $dsLoaiSanPham= loai::all();
        return response()->json([
        'success'   =>true,
        'data'=>$dsLoaiSanPham
        ]);
    }
    // lay san pham theo loai san pham
    public function dsSanPhamTheoLoai(){
        $dsLoaiSanPham= loai::with('ds_san_pham')->get();
        return response()->json([
        'success'   =>true,
        'data'=>$dsLoaiSanPham
        ]);
    }
    public function themMoi(Request $rq){
        if(empty($rq->Ten)){
            return response()->json([
                'succes'=>false,
                'message'=>"chua nhap ten loai"
            ]);
        }
    

#kiem tra san pham 
    $Loai=loai::where('Ten',$rq ->Ten)->first();
    if(!empty($Loai)){
        return response()->json([
            'succes'=>false,
            'message'=>"loai san pham {$rq ->Ten} da ton tai "
        ]);
    }

        $Loai = new loai();
        $Loai->ten = $rq->Ten;
        $Loai->save();
        return response()->json([
            'succes'=>true,
            'message'=>"them moi thanh cong"
        ]);

    }
}
