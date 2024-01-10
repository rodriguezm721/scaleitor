<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractual extends Model
{
    use HasFactory;
    public function times() {
        return $this->hasMany(Time::class);
    }
    public function amounts() {
        return $this->hasMany(Amount::class);
    }
}
