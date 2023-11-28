<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hinh_anh;
class san_pham extends Model
{
    use HasFactory; 
    protected $table ='san_pham';

    public function hinh_anh(){
        return $this->hasMany(hinh_anh::class);
      
    }
    public function loai() {
        return $this->belongsTo(loai::class);
    }
    public function nha_cung_cap() {
        return $this->belongsTo(nha_cung_cap::class);
    }
}
