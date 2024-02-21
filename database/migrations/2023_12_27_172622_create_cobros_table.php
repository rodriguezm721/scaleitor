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
            $table->string('periodo', 150);
            $table->date('fecha_ingreso');
            $table->decimal('programado', 15, 2);
            $table->decimal('acum_promg', 15, 2)->nullable();
            $table->integer('acumpg_xcentaje')->nullable();
            $table->decimal('estimado', 15, 2);
            $table->decimal('acum_esti', 15, 2)->nullable();
            $table->integer('acumest_xcentaje')->nullable();
            $table->decimal('cobrado', 15, 2);
            $table->decimal('acum_cobra', 15, 2)->nullable();
            $table->integer('acumcobra_xcentaje')->nullable();
            $table->string('num_factura', 100);
            $table->text('comentario')->nullable();
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
