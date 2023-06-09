<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function statuse(){
        return $this->belongsTo(Statuse::class);
    }

    public function stok(){
        return $this->hasMany(Stok::class);
    }
}
