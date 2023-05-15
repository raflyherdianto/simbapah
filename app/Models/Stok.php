<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function jenis_sampah(){
        return $this->belongsTo(JenisSampah::class);
    }

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }
}
