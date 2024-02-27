<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class CobrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cobro1 = new User;
        $cobro1->name = 'Juan';
        $cobro1->email = 'juan@gmail.com';
        $cobro1->password = '12345';
        $cobro1->save();
    }
}
