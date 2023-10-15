<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    protected $fillable = ['ten', 'ma_ncc', 'dia_chi', 'email', 'phone', 'mo_ta', 'trang_thai'];
    use HasFactory;
}
