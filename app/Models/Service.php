<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function customers(){
        return $this->hasMany(Customer::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
