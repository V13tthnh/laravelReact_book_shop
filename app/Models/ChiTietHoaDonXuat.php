<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;
use App\Models\HoaDonXuat;

class ChiTietHoaDonXuat extends Model
{
    protected $fillable = ['id', 'hoa_don_xuats_id', 'san_phams_id', 'so_luong', 'don_gia'];
    use HasFactory;

    public function hoa_don_xuats(){
        return $this->belongsTo(HoaDonXuat::class);
    }

    public function san_phams(){
        return $this->belongsTo(SanPham::class);
    }
}
