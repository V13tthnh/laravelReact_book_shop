<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $fillable = ['id', 'ten', 'email', 'password', 'sdt', 'dia_chi', 'gioi_tinh'];
    use HasFactory;
}
