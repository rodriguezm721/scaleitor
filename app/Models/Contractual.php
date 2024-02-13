<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractual extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function times() {
        return $this->hasMany(Time::class);
    }
    public function cobros() {
        return $this->hasMany(Cobros::class);
    }
    public function services() {
        return $this->hasMany(Service::class);
    }
    public function advances() {
        return $this->hasMany(Advance::class);
    }
}
