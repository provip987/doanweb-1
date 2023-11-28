<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NguoiDungController extends Controller
{
    public function Login()
    {
        return View('Account/login');
    }
    public function Register()
    {
        return View('Account/register');
    }
    public function KTLogin(Request $rq)
    {
   
        
        if(Auth::attempt(['ten_dang_nhap'=> $rq->TenTK, 'password'=>$rq->MK ])) {
            return "khong thanh cong";
        }
        
       
        return redirect()->route('trangchu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('DangNhap'); 
    }
}
