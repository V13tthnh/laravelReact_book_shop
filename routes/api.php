<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIControllers\APISanPhamController;
use App\Http\Controllers\APIControllers\APILoaiSanPhamController;
use App\Http\Controllers\APIControllers\APIHoaDonXuatController;
use App\Http\Controllers\APIControllers\APIKhachHangController;
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
//api-san-pham
Route::get('/san-pham', [APISanPhamController::class, 'layDanhSach']);
Route::get('/san-pham/{id}', [APISanPhamController::class, 'layChiTiet']);
Route::get('/lay-sp-lq/{id}', [APISanPhamController::class, 'laySPLienQuan']);
Route::post('/san-pham', [APISanPhamController::class, 'themMoi']);
Route::post('/tim-kiem-san-pham', [APISanPhamController::class, 'timKiem']);
Route::put('/san-pham/{id}', [APISanPhamController::class, 'capNhat']);
Route::delete('/san-pham/{id}', [APISanPhamController::class, 'xoa']);
//api-loai-san-pham
Route::get('/loai-san-pham', [APILoaiSanPhamController::class, 'layDanhSach']);
Route::get('/loai-san-pham/{id}', [APILoaiSanPhamController::class, 'layChiTiet']);
Route::get('/danh-sach-lsp-sp', [APILoaiSanPhamController::class, 'layDsLoaiSanPhamVaSanPham']);
Route::get('/danh-sach-lsp-sp/{id}', [APILoaiSanPhamController::class, 'layDsCTLoaiSanPhamVaSanPham']);
Route::post('/tim-kiem-loai-san-pham', [APILoaiSanPhamController::class, 'timKiem']);
Route::post('/loai-san-pham', [APILoaiSanPhamController::class, 'themMoi']);
Route::put('/loai-san-pham/{id}', [APILoaiSanPhamController::class, 'capNhat']);
Route::delete('/loai-san-pham/{id}', [APILoaiSanPhamController::class, 'xoa']);
//api-hoa-don-xuat
Route::post('/hoa-don-xuat', [APIHoaDonXuatController::class, 'themMoi']);
//api-khach-hang
Route::get('/khach-hang', [APIKhachHangController::class, 'layDanhSach']);
Route::post('/khach-hang', [APIKhachHangController::class, 'dangKyThanhVien']); 