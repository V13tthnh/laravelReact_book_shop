<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use DB;



class APILoaiSanPhamController extends Controller
{

    public function layDanhSach(){
        $dsLoaiSanPham = LoaiSanPham::all();
        if(empty($dsLoaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không có dữ liệu!",
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $dsLoaiSanPham,
        ]);
    }

    public function layChiTiet($id){
        $ctLoaiSanPham = LoaiSanPham::find($id);
        if(empty($ctLoaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không tìm thấy sản phẩm id={$id}!",
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $ctLoaiSanPham
        ]);
    }

    public function themMoi(Request $rq){
        if(empty($rq->ten)){
            return response()->json([
                'success' => false,
                'message' => 'Chưa nhập tên loại sản phẩm!'
            ]);
        }
        //kiem tra san pham co ton tai trong db chua
        $loaiSanPham = LoaiSanPham::where('ten', $rq->ten)->first();
        if(!empty($loaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Loại sản phẩm đã tồn tại!"
            ]);
        }
        $loaiSanPham = new LoaiSanPham;
        $loaiSanPham->ten = $rq->ten;
        $loaiSanPham->mo_ta = $rq->mo_ta;
        $loaiSanPham->save();
        return response()->json([
            'success' => true,
            'message' => "Thêm thành công!"
        ]);
    }


    public function capNhat(Request $rq, $id){
        $loaiSanPham = LoaiSanPham::find($id);
        if(empty($loaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không tim thấy sản phẩm id={$id}!"
            ]);
        }
       
        if(empty($rq->ten)){
            return response()->json([
                'success' => false,
                'message' => "Chưa nhập tên sản phẩm!"
            ]);
        }
        $count = LoaiSanPham::where('id', '<>', $id)->where('ten', $rq->ten)->count(); //<> toan tu khác
        if($count > 0){
            return response()->json([
                'success' => false,
                'message' => "Loại sản phẩm đã tồn tại!"
            ]);
        }
        $loaiSanPham->ten = $rq->ten;
        $loaiSanPham->mo_ta = $rq->mo_ta;
        $loaiSanPham->save();

        return response()->json([
            'success' => true,
            'message' => "Cập nhật thành công!"
        ]);
    }

    public function xoa($id){
        $loaiSanPham = LoaiSanPham::find($id);
        if(empty($loaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không có sản phẩm!"
            ]);
        }
        $loaiSanPham->delete();
        return response()->json([
            'success' => true,
            'message' => "Xóa thành công!"
        ]);
    }

    public function timKiem(Request $rq){
        $loaiSanPham = LoaiSanPham::where('ten', $rq->ten)->first();
        if(empty($loaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không tìm thấy loại sản phẩm!"
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $loaiSanPham
        ]);
    }

    public function layDsLoaiSanPhamVaSanPham(){
        $loaiSanPham = LoaiSanPham::with('ds_san_pham')->get();
        if(empty($loaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không có dữ liệu!"
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $loaiSanPham
        ]);
    }

    public function layDsCTLoaiSanPhamVaSanPham($id){
        $sanPham = SanPham::find($id);
        $loaiSanPham = LoaiSanPham::with('ds_san_pham')->where('id', $sanPham->loai_san_phams_id)->get(); 
        if(empty($loaiSanPham)){
            return response()->json([
                'success' => false,
                'message' => "Không tìm thấy loại sản phẩm!"
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $loaiSanPham
        ]);
    }
}
