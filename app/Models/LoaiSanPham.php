<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SanPham;

class LoaiSanPham extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $fillable = ['ten', 'mo_ta'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    use HasFactory;

    public function ds_san_pham(){
        return $this->hasMany(SanPham::class, 'loai_san_phams_id');
    }
}
