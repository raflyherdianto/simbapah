<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function kategori_sampah(){
        return $this->belongsTo(KategoriSampah::class);
    }

    public function stok(){
        return $this->hasMany(Stok::class);
    }
}
