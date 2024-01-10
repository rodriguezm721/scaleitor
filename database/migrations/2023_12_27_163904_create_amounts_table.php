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
        Schema::create('amounts', function (Blueprint $table) {
            $table->id();
            $table->text('convenio');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->dateTime('fecha_creacion');
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
        Schema::dropIfExists('amounts');
    }
};
