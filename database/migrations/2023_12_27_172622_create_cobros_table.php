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
        Schema::create('cobros', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_contrato', 15, 2);
            $table->string('periodo', 150);
            $table->date('fecha_ingreso');
            $table->decimal('programado', 15, 2);
            $table->integer('program_xcentaje');
            $table->decimal('acum_promg', 15, 2);
            $table->integer('acumpg_xcentaje');
            $table->decimal('estimado', 15, 2);
            $table->integer('estim_xcentaje');
            $table->decimal('acum_esti', 15, 2);
            $table->integer('acumest_xcentaje');
            $table->decimal('cobrado', 15, 2);
            $table->integer('cobra_xcentaje');
            $table->decimal('acum_cobra', 15, 2);
            $table->integer('acumcobra_xcentaje');
            $table->text('comentario')->nullable();
            $table->string('rsr', 150)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('contractual_id');
            $table->foreign('contractual_id')->references('id')->on('contractuals')
            ->onDelete('cascade') // Eliminación en cascada
            ->onUpdate('cascade'); // Actualización en cascada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobros');
    }
};
