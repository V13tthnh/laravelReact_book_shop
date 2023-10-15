<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHang;

class APIKhachHangController extends Controller
{
    public function layDanhSach(){
        $khachHang = KhachHang::all();
        if(empty($khachHang)){
            return response()->json([
                'success' => false,
                'message' => "Không có dữ liệu!"
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $khachHang
        ]);
    }
    public function dangKyThanhVien(Request $rq){
        if(empty($rq->email)){
            return response()->json([
                'success' => false,
                'message' => "Chưa nhập email!"
            ]);
        }
        if(empty($rq->ten)){
            return response()->json([
                'success' => false,
                'message' => "Chưa nhập tên!"
            ]);
        }
        $email = KhachHang::where('email', $rq->email)->first();
        if(!empty($email)){
            return response()->json([
                'success' => false,
                'message' => "Email đã tồn tại!"
            ]);
        }
        $khachHang = new KhachHang;
        $khachHang->ten = $rq->ten;
        $khachHang->email = $rq->email;
        $khachHang->password = $rq->password;
        $khachHang->dia_chi = "";
        $khachHang->sdt = "";
        $khachHang->gioi_tinh = "";
        $khachHang->save();
        return response()->json([
            'success' => true,
            'message' => "Đăng ký thành công!"
        ]);
    }
}
