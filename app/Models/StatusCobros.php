<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCobros extends Model
{
    use HasFactory;
    public function cobros() {
        return $this->belongsTo(Cobros::class);
    }
}
