<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuse extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function petugase(){
        return $this->belongsTo(Petugase::class);
    }

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }
}
