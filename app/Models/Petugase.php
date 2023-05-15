<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugase extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    // protected $table = 'petugas';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function statuse(){
        return $this->belongsTo(Statuse::class);
    }
}
