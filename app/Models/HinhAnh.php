<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $fillable = ['url', 'san_phams_id'];
    protected $hidden = ['created_at', 'updated_at', 'san_phams_id'];
    use HasFactory;

    public function san_phams(){
        return $this->belongsTo(SanPham::class);
    }
}
