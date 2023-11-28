<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khach_hang extends Model
{
    
    use HasFactory;
    protected $table="khach_hang";
    public function quyen() {
        return $this->belongsTo(quyen::class);
    }
}
