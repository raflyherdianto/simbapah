<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSampah extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function jenis_sampah(){
        return $this->hasMany(JenisSampah::class);
    }
}
