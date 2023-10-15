<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    protected $fillable = ['admins_id', 'nha_cung_caps_id', 'thanh_tien'];
    use HasFactory;

    public function admins(){
        return $this->belongsTo(Admin::class);
    }

    public function nha_cung_caps(){
        return $this->belongsTo(NhaCungCap::class);
    }
}
