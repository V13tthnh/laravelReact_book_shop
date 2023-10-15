<?php

namespace App\Http\Controllers;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $ds_hinh_anh = HinhAnh::all();
        $san_pham = SanPham::paginate(5);
        return view('san-pham.index', compact('san_pham', 'ds_hinh_anh'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loai_san_pham = LoaiSanPham::all();
       return view('san-pham.create', compact('loai_san_pham'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //them san pham
        $san_pham = new SanPham;
        $san_pham->ten = $request->ten;
        $san_pham->SKU = $request->SKU;
        $san_pham->mo_ta = $request->mo_ta;
        $san_pham->gia_ban = 0;
        $san_pham->so_luong = 0;
        $san_pham->loai_san_phams_id = $request->loai_san_phams_id;
        $san_pham->trang_thai = 1;
        $san_pham->save();
        //them anh
        $files = $request->images;
        $paths = [];
        if($request->hasFile('images')){
            foreach($files as $file){
                $hinh_anh = new HinhAnh;
                $path = $file->store('uploads');
                $hinh_anh->url = $path; 
                $hinh_anh->san_phams_id = $san_pham->id;
                $paths[] = $path;
                $hinh_anh->save();
            }   
        }
        return redirect()->route('san-pham.index')->with('thong-bao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $san_pham = SanPham::find($id);
        if(empty($san_pham)){
            return redirect()->route('san-pham.index')->with('thong-bao', 'Sản phẩm không tồn tại!');
        }
        $anh_sp = $san_pham->ds_hinh_anh;
        return view('san-pham.show', compact('san_pham', 'anh_sp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $san_pham = SanPham::find($id);
        $anh_sp = $san_pham->ds_hinh_anh;
        $loai_san_pham = LoaiSanPham::all();
        return view('san-pham.edit', compact('san_pham', 'loai_san_pham', 'anh_sp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //them anh
        $files = $request->images;
        $paths = [];
        if($request->hasFile('images')){
            foreach($files as $file){
                $hinh_anh = new HinhAnh;
                $path = $file->store('uploads');
                $hinh_anh->url = $path; 
                $hinh_anh->san_phams_id = $id;
                $paths[] = $path;
                $hinh_anh->save();
            }
        }
        //sua san pham
        $san_pham = SanPham::find($id);
        $san_pham->ten = $request->ten;
        $san_pham->so_luong = 0;
        $san_pham->mo_ta = $request->mo_ta;
        $san_pham->gia_ban = 0;
        $san_pham->loai_san_phams_id = $request->loai_san_phams_id;
        $san_pham->trang_thai = 1;
        $san_pham->update();
        return redirect()->route('san-pham.index')->with('thongbao', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SanPham::find($id)->delete();
        return redirect()->route('san-pham.index')->with('thong-bao', 'Xóa thành công!');
    }

    public function product_trash(){
        $product_trash = SanPham::onlyTrashed()->get();
        return view('san-pham.product_trash', compact('product_trash'));
    }

    public function untrash($id)
    {   
        SanPham::withTrashed()->find($id)->restore();
        return redirect()->route('san-pham.index')->with('thong-bao', 'Khôi phục thành công!');
    }

    //Xoa 1 anh sp
    public function xoa_anh_sp($id){
        $hinh_anh = HinhAnh::find($id);
        if(!$hinh_anh) abort(404);
        unlink(public_path($hinh_anh->url)); 
        $hinh_anh->delete();
        return back()->with('thongbao', 'Xóa ảnh thành công!');
    }
}