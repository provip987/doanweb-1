<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;

use App\Http\Controllers\APIAuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("/dang-nhap",[APIAuthController::class,"dangNhap"]);


Route::get("/san-pham",[APISanPhamController::class,"layDanhSach"]);
Route::get("/san-pham/{id}",[APISanPhamController::class,"chitietsanpham"]);

Route::get("/san-pham-theo-loai",[APILoaiSanPhamController::class,"dsSanPhamTheoLoai"]);
Route::get("/loai-san-pham",[APILoaiSanPhamController::class,"layDanhSach"]);
Route::post("/loai-san-pham",[APILoaiSanPhamController::class,"themMoi"]);