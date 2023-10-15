<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\HoaDonNhapController;

Route::get('/', [SanPhamController::class, 'index'])->middleware('check.admin.login');
//admin
Route::get('/admin/dang-nhap', [AdminController::class, 'dang_nhap'])->name('dang-nhap');
Route::post('/admin/xu-ly-dang-nhap', [AdminController::class, 'xu_ly_dang_nhap'])->name('xu-ly-dang-nhap');;
Route::get('/admin/xu-ly-dang-xuat', [AdminController::class, 'xu_ly_dang_xuat'])->name('xu-ly-dang-xuat');
Route::group(['middleware'=>'check.admin.login'], function(){
    Route::resource('/admin',  AdminController::class)->middleware('check.admin.login');
    Route::group(['middleware' => 'check.is.admin'], function(){
        Route::resource('/admin',  AdminController::class, ['only'=>['update', 'store', 'destroy']]);
    });
});

//loai-san-pham
Route::group(['middleware' => 'check.admin.login'], function()
{
    Route::resource('/loai-san-pham', LoaiSanPhamController::class);
    Route::group(['middleware' => 'check.is.admin'], function(){
        Route::resource('/loai-san-pham', LoaiSanPhamController::class, ['only'=>['update', 'store', 'destroy']]);
    });
});
Route::get('/productType_trash', [LoaiSanPhamController::class, 'productType_trash'])->name('productType_trash');
Route::get('/untrash-productType/{id}', [LoaiSanPhamController::class, 'untrash'])->name('loai-san-pham.untrash');

//san-pham
Route::group(['middleware' => 'check.admin.login'], function()
{
    Route::resource('/san-pham', SanPhamController::class);
    Route::group(['middleware' => 'check.is.admin'], function(){
        Route::resource('/san-pham', SanPhamController::class, ['only'=>['update', 'store', 'destroy']]);
    });
});
Route::get('/san-pham/xoa-anh-sp/{id}', [SanPhamController::class, 'xoa_anh_sp'])->name('xoa-anh-sp');
Route::get('/product_trash', [SanPhamController::class, 'product_trash'])->name('product_trash');
Route::get('/untrash-product/{id}', [SanPhamController::class, 'untrash'])->name('san-pham.untrash');

//nha-cung-cap
Route::group(['middleware' => 'check.admin.login'], function()
{
    Route::resource('/nha-cung-cap', NhaCungCapController::class);
    Route::group(['middleware' => 'check.is.admin'], function(){
        Route::resource('/nha-cung-cap', NhaCungCapController::class, ['only'=>['update', 'store', 'destroy']]);
    });
});

//hoa-don
Route::get('/hoa-don', [HoaDonNhapController::class, 'index'])->name('hoa-don')->middleware('check.admin.login');
Route::get('/hoa-don/chi-tiet-don-nhap/{id}', [HoaDonNhapController::class, 'show'])->name('chi-tiet-don-nhap')->middleware('check.admin.login');
Route::get('/nhap-hang', [HoaDonNhapController::class, 'create'])->name('nhap-hang')->middleware('check.admin.login');
Route::post('/nhap-hang/xu-ly-nhap-hang', [HoaDonNhapController::class, 'store'])->name('xu-ly-nhap-hang')->middleware('check.admin.login');

