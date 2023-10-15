<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhan_vien = Admin::paginate(5);
        return view('admin.index', compact('nhan_vien'));

    }

    public function dang_nhap()
    {
        return view('admin.login');

    }

    //xu-ly-dang-nhap
    public function xu_ly_dang_nhap(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if(Hash::check($request->password, $admin->password)){
            session(['isAdmin'=> $admin]);  
            return redirect()->route('san-pham.index')->with('thongbaodangnhap', 'Đăng nhập thành công!!!');
        }
        return redirect()->back();
    }

    public function xu_ly_dang_xuat(){
        session()->forget('isAdmin');
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nhan_vien = new Admin;
        $nhan_vien->ten = $request->ten;
        $nhan_vien->email = $request->email;
        $nhan_vien->password = Hash::make($request->password);
        $nhan_vien->quyen = $request->quyen;
        $nhan_vien->save();
        return redirect()->route('admin.index')->with('thong-bao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nhan_vien = Admin::find($id);
        return view('admin.edit', compact('nhan_vien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nhan_vien = Admin::find($id);
        $nhan_vien->ten = $request->ten;
        $nhan_vien->email = $request->email;
        $nhan_vien->password = encrypt($request->password);
        $nhan_vien->quyen = $request->quyen;
        $nhan_vien->save();
        return redirect()->route('admin.index')->with('thong-bao', 'Thêm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
