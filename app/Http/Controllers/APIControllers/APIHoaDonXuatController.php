<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonXuat;
use App\Models\SanPham;
use App\Models\ChiTietHoaDonXuat;

class APIHoaDonXuatController extends Controller
{

    public function themMoi(Request $rq){
        if(empty($rq->san_phams_id)){
            return response()->json([
                'success' => false,
                'message' => 'Chưa chọn sản phẩm!'
            ]);
        }
        //kiem tra so luong ton kho
        for($i = 0; $i < count($rq->san_phams_id); $i++){
            $kiemTraSoLuong = SanPham::find($rq->san_phams_id[$i]);
            if($kiemTraSoLuong->so_luong < $rq->so_luong[$i]){
                return response()->json([
                    'success' => false,
                    'message' => "Sản phẩm trong kho không đủ!"
                ]); 
            }
        }
        
        $hoaDonXuat = new HoaDonXuat;
        $hoaDonXuat->khach_hangs_id = 1;
        $hoaDonXuat->ngay_giao = $rq->ngay_giao;
        $hoaDonXuat->dia_chi = $rq->dia_chi;
        $hoaDonXuat->sdt = $rq->sdt;  
        $hoaDonXuat->thanh_tien = 0;        
        $hoaDonXuat->trang_thai = 1;
        $hoaDonXuat->save();

        $thanhTien = 0;
        for($i = 0; $i < count($rq->san_phams_id); $i++){
            $ctHoaDonXuat = new ChiTietHoaDonXuat;
            $ctHoaDonXuat->hoa_don_xuats_id = $hoaDonXuat->id;
            $ctHoaDonXuat->san_phams_id = $rq->san_phams_id[$i];
            $ctHoaDonXuat->so_luong = $rq->so_luong[$i];
            $ctHoaDonXuat->don_gia = $rq->don_gia[$i];
            $ctHoaDonXuat->save();
            
            $thanhTien += $rq->thanh_tien[$i];
            //tru so luong trong kho
            $sp = SanPham::find($ctHoaDonXuat->san_phams_id);
            $sp->so_luong -= $ctHoaDonXuat->so_luong;
            $sp->save();
        }
        $capNhatThanhTien = HoaDonXuat::find($hoaDonXuat->id);
        $capNhatThanhTien->thanh_tien = $thanhTien;
        $capNhatThanhTien->save();
        return response()->json([
            'success' => true,
            'message' => "Thêm hóa đơn thành công!"
        ]);
    }
}
