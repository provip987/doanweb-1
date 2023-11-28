<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\san_pham;
use App\Models\khach_hang;
use App\Models\nhan_vien;
use Illuminate\Http\Request;

class PhieuXuatController extends Controller
{
    public function xuat()
    {
        $dsKH=khach_hang::all();
        $dsSanPham = san_pham::all();
        $dsNhanVien=admin::all();
        return view('Xuat-Hang/xuat-hang',compact('dsKH','dsSanPham','dsNhanVien')); 
    }
    


}
