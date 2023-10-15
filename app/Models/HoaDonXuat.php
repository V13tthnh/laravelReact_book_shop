<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChiTietHoaDonXuat;
use App\Models\KhachHang;

class HoaDonXuat extends Model
{
    protected $fillable = ['id', 'khach_hangs_id', 'ngay_giao', 'dia_chi', 'sdt', 'thanh_tien', 'trang_thai'];
    protected $hidden = ['trang_thai', 'created_at', 'updated_at'];
    use HasFactory;

    public function ds_chi_tiet_hoa_don_xuat(){
        return $this->hasMany(ChiTietHoaDonXuat::class);
    }
    
    public function khach_hangs(){
        return $this->belongsTo(KhachHang::class);
    }
}
