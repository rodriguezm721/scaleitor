<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function histories(){
        return $this->hasMany(History::class);
    }
    public function risks(){
        return $this->hasMany(Risk::class);
    }
}
