<?php

namespace App\Http\Controllers;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nha_cung_cap = NhaCungCap::paginate(5);
        return view('nha-cung-cap.index', compact('nha_cung_cap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nha-cung-cap.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(empty($request->ten)){
            return back()->with('thong-bao', 'Chưa nhập tên nhà cung cấp!');
        }
        $nhaCungCap = NhaCungCap::where('ten', $request->ten)->first();
        if(!empty($nhaCungCap)){
            return back()->with('thong-bao', 'Nhà cung cấp đã tồn tại!');
        }
        $nha_cung_cap = new NhaCungCap;
        $nha_cung_cap->ten = $request->ten;
        $nha_cung_cap->dia_chi = $request->dia_chi;
        $nha_cung_cap->ma_ncc = $request->ma_ncc;
        $nha_cung_cap->email = $request->email;
        $nha_cung_cap->phone = $request->phone;
        $nha_cung_cap->mo_ta = $request->mo_ta;
        $nha_cung_cap->trang_thai = 1;
        $nha_cung_cap->save();
        return redirect()->route('nha-cung-cap.index')->with('thong-bao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nha_cung_cap = NhaCungCap::find($id);
        if(empty($nha_cung_cap)){
            return redirect()->route('nha-cung-cap.index')->with('thong-bao', 'Nhà cung cấp không tồn tại!');
        }
        return view('nha-cung-cap.show', compact('nha_cung_cap'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nha_cung_cap = NhaCungCap::find($id);
        return view('nha-cung-cap.edit', compact('nha_cung_cap'));
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
