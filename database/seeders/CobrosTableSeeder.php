<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cobros;


class CobrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cobro1 = new Cobros;
        $cobro1->estatus_est = 'Ejemplo';
        $cobro1->ajuste_costos = 'Ejemplo';
        $cobro1->act_indirectos = 'ejemplo';
        $cobro1->save();
    }
}
