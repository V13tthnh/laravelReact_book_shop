<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;

class SanPham extends Model
{
    use SoftDeletes;
    protected $fillable = ['ten', 'SKU', 'mo_ta', 'so_luong', 'gia_ban', 'loai_san_phams_id', 'trang_thai'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'loai_san_phams_id', 'trang_thai'];
    use HasFactory;

    public function loai_san_phams(){
        return $this->belongsTo(LoaiSanPham::class);
    }

    public function ds_hinh_anh(){
        return $this->hasMany(HinhAnh::class, 'san_phams_id');
    }
}
