<?php

namespace App\Http\Controllers;
use App\Models\NhaCungCap;
use App\Models\SanPham;
use App\Models\HoaDonNhap;
use App\Models\CTHoaDonNhap;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use DB;

class HoaDonNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoa_don_nhap = HoaDonNhap::paginate(5);
        return view('hoa-don.index', compact('hoa_don_nhap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loai_san_pham = LoaiSanPham::all();
        $nha_cung_cap = NhaCungCap::all();
        $san_pham = SanPham::all();
        return view('hoa-don.create', compact('nha_cung_cap', 'san_pham', 'loai_san_pham'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $don_nhap = new HoaDonNhap;
        $don_nhap->admins_id = session()->get('isAdmin.id');
        $don_nhap->nha_cung_caps_id = $request->nha_cung_caps_id;
        $don_nhap->thanh_tien = 0;
        $don_nhap->save();
        $thanh_tien = 0;
        for($i = 0; $i < count($request->san_phams_id); $i++){
            $ct_don_nhap = new CTHoaDonNhap;
            $ct_don_nhap->hoa_don_nhaps_id = $don_nhap->id;
            $ct_don_nhap->san_phams_id = $request->san_phams_id[$i];
            $ct_don_nhap->so_luong = $request->so_luong[$i];
            $ct_don_nhap->gia_nhap = $request->gia_nhap[$i];
            $ct_don_nhap->gia_ban = $request->gia_ban[$i];
            $ct_don_nhap->lo_nhap = '';
            $ct_don_nhap->save();

            $thanh_tien += $request->thanh_tien[$i];

            $sp = SanPham::find($ct_don_nhap->san_phams_id);
            $sp->so_luong += $ct_don_nhap->so_luong;
            $sp->gia_ban = $ct_don_nhap->gia_ban;
            $sp->save();
        }
       
        $update_thanh_tien = HoaDonNhap::find($don_nhap->id);
        $update_thanh_tien->thanh_tien = $thanh_tien;
        $update_thanh_tien->save();
        return redirect()->route('hoa-don')->with('thong-bao', "Thêm thành công!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cthdn = CTHoaDonNhap::where('hoa_don_nhaps_id', $id)->get();
        if(empty($cthdn)){
            return redirect()->route('hoa-don.index')->with('thong-bao', 'Hóa đơn không tồn tại!');
        }
        return view('hoa-don.show', compact('cthdn'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
