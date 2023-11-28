<?php
namespace App\Http\Controllers;
use App\Models\khach_hang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    //
    public function DanhSachKH()
    {
        $dsKH= khach_hang::all();
        return view('client.danh-sach',compact('dsKH'));
    }
    public function themKhachHang(){
        return view('client.themKhachHang');
    }
    public function xulythemkhachhang(Request $request){
        $dsKH= new khach_hang ();

        $dsKH->ten=$request->ten;
        $dsKH->ten_dang_nhap=$request->ten_dang_nhap;
        $dsKH->password=$request->password;
        $dsKH->email=$request->email;
        $dsKH->sdt=$request->sdt;
        $dsKH->dia_chi=$request->dia_chi;
        $dsKH->quyen=$request->quyen;

        $dsKH->save();
        return redirect()->route('DSKH');
    }
    public function capnhatkhachhang(khach_hang $id){
        return view('client/capNhatKhachHang',['id'=>$id]);
    }
    
    public function xulycapnhatkhachhang(Request $request,$id){
        $dsKH =khach_hang ::find($id);
        if($dsKH){
           
            $dsKH->ten = $request->ten;
            $dsKH->ten_dang_nhap = $request->ten_dang_nhap;
            $dsKH->password=$request->password;
            $dsKH->email=$request->email;
            $dsKH->sdt=$request->sdt;
            $dsKH->dia_chi=$request->dia_chi;
            $dsKH->quyen=$request->quyen;
    
            $dsKH->save();

        }
      
        return redirect()->route('DSKH',['id'=>$dsKH]);
    }
    public function  xulyxoakhachhang( $id){
        
        $dsKH = Khach_hang::find($id);
        $dsKH->delete();
        
        return redirect()->route('DSKH');
    }


        

         

    
}
