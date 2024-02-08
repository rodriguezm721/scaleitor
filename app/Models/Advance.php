<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function solutions(){
        return $this->hasMany(Solution::class);
    }
    public function contractuals() {
        return $this->belongsTo(Contractual::class);
    }
}
