<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_cobros', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_contrato', 11, 5);
            $table->string('periodo', 100);
            $table->date('fecha_ingreso');
            $table->decimal('programado', 10, 5);
            $table->decimal('program_xcentaje', 5, 2);
            $table->decimal('acum_promg', 10, 5);
            $table->decimal('acumpg_xcentaje', 5, 2);
            $table->decimal('estimado', 10, 5);
            $table->decimal('estim_xcentaje', 5, 2);
            $table->decimal('acum_esti', 10, 5);
            $table->decimal('acumest_xcentaje', 5, 2);
            $table->decimal('cobrado', 10, 5);
            $table->decimal('cobra_xcentaje', 5, 2);
            $table->decimal('acum_cobra', 10, 5);
            $table->decimal('acumcobra_xcentaje', 5, 2);
            $table->text('comentario');
            $table->string('rsr', 150);
            $table->timestamps();

            $table->unsignedBigInteger('cobro_id');
            $table->foreign('cobro_id')->references('id')->on('cobros')
            ->onDelete('cascade') // Eliminación en cascada
            ->onUpdate('cascade'); // Actualización en cascada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_cobros');
    }
};
