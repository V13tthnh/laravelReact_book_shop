<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

class APISanPhamController extends Controller
{
    public function layDanhSach(){
        $dsSanPham = SanPham::all();
        if(empty($dsSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không có dữ liệu!",
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $dsSanPham,
        ]);
    }

    public function layChiTiet($id){
        $ctSanPham = SanPham::with('ds_hinh_anh')->with('loai_san_phams')->find($id);
        if(empty($ctSanPham)){
            return response()->json([
                'success' => false,
                'data' => "Không tìm thấy sản phẩm id={$id}!",
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $ctSanPham
        ]);
    }

    public function themMoi(Request $rq){
        if(empty($rq->ten)){
            return response()->json([
                'success' => false,
                'message' => 'Chưa nhập tên sản phẩm'
            ]);
        }
    
        $sanPham = SanPham::where('ten', $rq->ten)->first();
            if(!empty($sanPham)){
                return response()->json([
                    'success' => false,
                    'message' => "Sản phẩm {$rq->ten} đã tồn tại!"
                ]);
            }
            $sanPham = new SanPham;
            $sanPham->ten = $rq->ten;
            $sanPham->SKU = $rq->SKU;
            $sanPham->mo_ta = $rq->mo_ta;
            $sanPham->so_luong = 0;
            $sanPham->gia_ban = 0;
            $sanPham->loai_san_phams_id = $rq->loai_san_phams_id;
            $sanPham->trang_thai = 1;
            $sanPham->save();
            return response()->json([
                'success' => true,
                'message' => "Thêm thành công!"
            ]);
    }

    public function capNhat(Request $rq, $id){
        $sanPham = SanPham::find($id);
        if(empty($sanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không tìm thấy sản phẩm!"
            ]);
        }
        if(empty($rq->ten)){
            return response()->json([
                'success' => false,
                'message' => "Chưa nhập tên!"
            ]);
        }
        $count = SanPham::where('id', '<>', $id)->where('ten', $rq->ten)->count();
        if($count > 0){
            return response()->json([
                'success' => false,
                'message' => "Sản phẩm {$rq->ten} đã tồn tại!"
            ]);
        }
        $sanPham->ten = $rq->ten;
        $sanPham->SKU = $rq->SKU;
        $sanPham->mo_ta = $rq->mo_ta;
        $sanPham->loai_san_phams_id = $rq->loai_san_phams_id;
        $sanPham->so_luong = 0;
        $sanPham->gia_ban = 0;
        $sanPham->trang_thai = 1;
        $sanPham->save();
        return response()->json([
            'success' => true,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function xoa($id){
        $sanPham = SanPham::find($id);
        if(empty($sanPham)){
            return response()->json([
                'success' => true,
                'message' => "Không tìm thấy sản phẩm!"
            ]);
        }
        $sanPham->delete();
        return response()->json([
            'success' => true,
            'message' => "Xóa thành công!"
        ]);
    }

    public function timKiem(Request $rq){
        $sanPham = $ctSanPham = SanPham::with('loai_san_phams')->where('ten', $rq->ten)->first();
        if(empty($sanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không tìm thấy sản phẩm!"
            ]);
        }
        return response()->json([
            'success' => true,
            'data' =>  $sanPham
        ]);
    }
    
    public function laySPLienQuan($id){
        $sanPham = SanPham::find($id);
        $spLienQuan = SanPham::with('ds_hinh_anh')->where('loai_san_phams_id', $sanPham->loai_san_phams_id)->get();
        if(empty($spLienQuan)){
            return response()->json([
                'success' => false,
                'message' => "Không tìm thấy sản phẩm!"
            ]);
        }
        return response()->json([
            'success' => true,
            'data' =>  $spLienQuan
        ]);
    }
}
