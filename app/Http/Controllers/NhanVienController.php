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
}
