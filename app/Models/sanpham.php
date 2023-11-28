<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table = "san_pham";
    public function loai() {
        return $this->belongsTo(loai::class);
    }
    public function nha_cung_cap() {
        return $this->belongsTo(nha_cung_cap::class);
    }
}
