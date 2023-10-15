<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHoaDonNhap extends Model
{
    protected $fillable = ["hoa_don_nhaps_id", 'san_phams_id', 'so_luong', 'gia_nhap', 'gia_ban', 'lo_hang'];
    use HasFactory;

    public function hoa_don_nhaps(){
        return $this->belongsTo(HoaDonNhap::class);
    }

    public function san_phams(){
        return $this->belongsTo(SanPham::class);
    }

}
