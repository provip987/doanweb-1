<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhaphangController;
use App\Http\Controllers\PhieuXuatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return View('trang-chu');
})->name('trangchu')->middleware('auth');

Route::get('/DangNhap', [AccountController::class, 'Login'])->name('DangNhap')->middleware('guest');
Route::post('/DangNhap', [AccountController::class, 'KTLogin'])->name('XLDangNhap');
Route::get('/DangXuat', [AccountController::class, 'logout'])->name('DangXuat');
Route::get('/DangKy', [AccountController::class, 'register'])->name('Dangky');
Route::post('/XLDangky', [AccountController::class, 'XLRegister']);






// Route::middleware('auth')->group(function () {
//     Route::prefix('san-pham')->group(function () {
//         Route::name('sanpham.')->group(function () {
//             Route::get('DanhSach', [SanPhamController::class, 'danhsach'])->name('trangchu');
//             Route::get('Them', [SanPhamController::class, 'Them'])->name('them'); 
//             Route::post('Them', [SanPhamController::class, 'xuLyThem'])->name('xuLyThem'); 
//             Route::get('Sua/{id}', [SanPhamController::class, 'Sua'])->name('Sua'); 
//             Route::post('Sua/{id}', [SanPhamController::class, 'xuLySua'])->name('xuLySua'); 
//             Route::get('HinhAnh/xem/{id}', [SanPhamController::class, 'XemHinhAnh'])->name('HinhAnh'); 
//             Route::get('HinhAnh/xoa/{id}', [SanPhamController::class, 'xuLyXoaAnh'])->name('xuLyXoaAnh'); 
//             Route::get('Xoa/{id}', [SanPhamController::class, 'xuLyXoa'])->name('xuLyXoa'); 

//         });

//     });
// });


Route::middleware('auth')->group(function () {
    Route::prefix('Loai')->group(function () {  
        Route::name('Loai.')->group(function () {
            Route::get('DanhSach', [LoaiController::class,'DanhSachLoai'])->name('DanhSach'); 
            Route::get('Them', [LoaiController::class, 'Them'])->name('them'); 
            Route::post('Them', [LoaiController::class, 'XuLyThem'])->name('XuLyThem'); 
            Route::get('Sua/{id}', [LoaiController::class, 'Sua'])->name('Sua'); 
            Route::post('Sua/{id}', [LoaiController::class, 'XuLySua'])->name('XuLySua'); 
            Route::get('Xoa/{id}', [LoaiController::class, 'XuLyXoa'])->name('xuLyXoa'); 
        });

    });
});

//client

Route::get('KhachHang/DS', [KhachHangController::class, 'DanhSachKH'])->name('DSKH');//->middleware('auth')
Route::get('client/themKhachHang', [KhachHangController::class, 'themKhachHang'])->name('themkhachhang');
Route::post('client/themKhachHangg', [KhachHangController::class, 'xulythemkhachhang'])->name('xulythemkhachhang');
Route::get('client/capNhatKhachHang/{id}',[KhachHangController::class,'capnhatkhachhang'])->name('capnhatkhachhangg');
Route::put('client/capNhatKhachHang/{id}',[KhachHangController::class,'xulycapnhatkhachhang'])->name('xulycapnhatkhachhang');
Route::delete('client/capNhatKhachHang/{id}',[KhachHangController::class,'xulyxoakhachhang'])->name('xoakhachhang');

//san pham
Route::get('hien_thi_ds_san_pham',[SanPhamController::class,'showSanPham'])->name('hienthidsSanPham');
Route::get('them_san_pham',[SanPhamController::class,'themSanPham'])->name('themsanpham');
Route::post('xu_ly them_SP',[SanPhamController::class,'xulyThemSanPham'])->name('xulythemSP');

//Nhan vien
Route::get('NhanVien/DS', [NhanVienController::class, 'DSNV'])->name('DSNV');//->middleware('auth');

//NhaCungCup

Route::get('NhaCungCap/san-pham', [NhaCungCapController::class, 'DanhSach'])->name('DSNCC');
Route::get('NhaCungCap/them', [NhaCungCapController::class, 'Them'])->name('NhaCungCap.Them');
Route::post('NhaCungCap/them', [NhaCungCapController::class, 'XuLyThem'])->name('NhaCungCap.XuLyThem');


Route::get('Nhap-Hang/nhap-hang', [NhaphangController::class, 'nhap'])->name('PhieuNhap.Nhap'); //->middleware('check.admin.login')

Route::post('Nhap-Hang/nhap-hang', [NhaphangController::class, 'xuLyNhap'])->name('PhieuNhap.xuLyNhap');

Route::get('Xuat-Hang/xuat-hang', [PhieuXuatController::class, 'xuat'])->name('PhieuXuat.Nhap');


