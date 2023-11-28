<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Controllers\NhaCungCapController;
use App\Models\nha_cung_cap;
use App\Models\phieu_nhap;
use App\Models\san_pham;
use App\Models\ChiTietHoaDonNhap;


Use Controllers\SanPhamController;
class NhaphangController extends Controller
{
    public function nhap()
    {
        $dsSanPham = san_pham::all();
        $dsNCC=nha_cung_cap::all();
        return view('Nhap-Hang/nhap-hang',compact('dsNCC','dsSanPham'));
    }
    function DanhSach(Request $request)
    {
         $DsPhieuNhap = phieu_nhap::all();
         return view('Nhap_hang/danh-sach',compact('DsPhieuNhap'));
    }
    public function xuLyNhap(Request $rq)
    {
        $DsPhieuNhap = phieu_nhap::all();
        $hd=new phieu_nhap();
        
        $hd->nha_cung_cap_id=$rq->ncc;
        $hd->nhan_vien_id=1;
        $hd->tong_tien=0;
        $hd->save();
        $tongTien=0;
        for($i=0;$i<count((array)$rq->san_pham_id);$i++){
            $cthd=new ChiTietHoaDonNhap();
            $cthd->phieu_nhap_id=$hd->id;
            $cthd->san_pham_id=$rq->san_pham_id[$i];
            $cthd->so_luong=$rq->so_luong[$i];
            $cthd->gia_nhap=$rq->gia_nhap[$i];
            $cthd->gia_ban=$rq->gia_ban[$i];
            $tongTien=$rq->so_luong[$i]*$rq->gia_ban[$i];
            $cthd->save();

            $sp=san_pham::find($cthd->san_pham_id);
            $sp->so_luong+=$cthd->so_luong;
            $sp->gia=$cthd->gia_ban;
            $sp->save();    
            
        }
        $capNhatTongTien = phieu_nhap::where('id', $hd->id)->first();
        $capNhatTongTien->tong_tien=$tongTien;
        $capNhatTongTien->save();
        return view('Nhap-Hang/danh-sach');
    }
}

