<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    

    public function index(){
        $loai_san_pham = LoaiSanPham::paginate(5);
        return view('loai-san-pham.index', compact('loai_san_pham'));
    }

    public function create()
    {
       return view('loai-san-pham.create');
    }

    public function store(Request $request)
    {
        if(empty($request->ten)){
            return back()->with('thong-bao', 'Chưa nhập tên sản phẩm!');
        }
        $loai_san_pham = new LoaiSanPham;
        $loai_san_pham->ten = $request->ten;
        $loai_san_pham->mo_ta = $request->mo_ta;
        $loai_san_pham->save();
        return redirect()->route('loai-san-pham.index')->with('thong-bao', 'Thêm thành công!');
    }

    public function show(string $id)
    {
        $loai_san_pham = LoaiSanPham::find($id);
        if(empty($loai_san_pham)){
            return redirect()->route('loai-san-pham.index')->with('thong-bao', 'Loại sản phẩm không tồn tại!');
        }
        return view('loai-san-pham.show', compact('loai_san_pham'));
    }

    public function edit(string $id)
    {
        $loai_san_pham = LoaiSanPham::find($id);
        if(empty($loai_san_pham)){
            return redirect()->route('loai-san-pham.index')->with('thong-bao', 'Loại sản phẩm không tồn tại!');
        }
        return view('loai-san-pham.edit', compact('loai_san_pham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(empty($request->ten)){
            return back()->with('thongbao', 'Chưa nhập tên sản phẩm!');
        }
        //sua san pham
        $loai_san_pham = LoaiSanPham::find($id);
        $loai_san_pham->ten = $request->ten;
        $loai_san_pham->mo_ta = $request->mo_ta;
        $loai_san_pham->update();
        return redirect()->route('loai-san-pham.index')->with('thongbao', 'Cập nhật thành công!');
    }

    public function destroy(string $id)
    {
        LoaiSanPham::find($id)->delete();
        return redirect()->route('loai-san-pham.index')->with('thong-bao', 'Xóa thành công!');
    }

    public function productType_trash(){
        $prodType_trash = LoaiSanPham::onlyTrashed()->get();
        return view('loai-san-pham.productType_trash', compact('prodType_trash'));
    }

    public function untrash($id)
    {   
        LoaiSanPham::withTrashed()->find($id)->restore();
        return redirect()->route('loai-san-pham.index')->with('thong-bao', 'Khôi phục thành công!');
    }

}
