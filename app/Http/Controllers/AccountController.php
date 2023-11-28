<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khach_hang;
use App\Models\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function Login()
    {
        return View('Account/login');
    }

    public function Register()
    {
        return View('Account/register');
    }
    public function XLRegister(Request $rq)
    {
        $XL = new khach_hang();
        if ($rq->MK == $rq->XNMK) {
            $XL->ten_dang_nhap = $rq->TenTK;
            $XL->mat_khau = $rq->MK;
            $XL->email = $rq->email;
            $XL->ho_ten = $rq->Ten;
            $XL->quyen_id = 1;
            $XL->save();
            return redirect()->route('DangNhap')->with('thong_bao', 'TẠO TÀI KHOẢN THÀNH CÔNG');
        }
        return redirect()->route('Dangky')->with('thong_bao', 'TẠO TÀI KHOẢN THẤT BẠI');

    }

    // Public function KTLogin(Request $rq)
    // {
    //     $Kt1 = khach_hang::where('ten_dang_nhap', $rq->TenTK )->where('mat_khau', $rq->MK)->first();
    //     $Kt2 = admin::where('ten_dang_nhap', $rq->TenTK )->where('password', $rq->MK)->first();
    //     if($Kt1)
    //     {

    //         session(['logged_in' => $Kt1->quyen_id]);
    //         return view("client/index");

    //     }
    //     if($Kt2)
    //     {
    //         session(['logged_in' => $Kt2->quyen_id]);
    //         return redirect()->route('trangchu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');

    //     }


    //         return redirect()->route('DangNhap')->with('thong_bao', 'ĐĂNG NHẬP THẤT BẠI');


    // }

    // public function logout(Request $request)
    // {
    //     // unset($_SESSION['logged_in']);
    //     $request->session()->forget('logged_in');
    //     return redirect()->route('DangNhap'); 
    // }
    public function KTLogin(Request $rq)
    {
        $acc = admin::where('ten_dang_nhap', $rq->ten_dang_nhap)->first();
      
        if ( Hash::check($rq->password, $acc->password) ) {
            if (Auth::attempt(['ten_dang_nhap' => $rq->ten_dang_nhap, 'password' => $rq->password])) {
               return redirect()->route('trangchu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
            }
            
        }
            // dd($rq);
        // return redirect()->route('trangchu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
        return redirect()->route('DangNhap')->with('thong_bao', 'ĐĂNG NHẬP THẤT BẠI');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('DangNhap');
    }
}
