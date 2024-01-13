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
            $table->string('estatus_est', 150);
            $table->text('ajuste_costos');
            $table->text('act_indirectos');
            $table->string('num_contrato_c', 255);
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
