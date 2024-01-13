<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobros extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function statuscobros(){
        return $this->hasMany(StatusCobros::class);
    }
}

