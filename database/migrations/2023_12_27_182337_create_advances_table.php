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
        Schema::create('advances', function (Blueprint $table) {
            $table->id();
            $table->string('partidas', 255)->nullable();
            $table->string('num_contrato_a', 255)->nullable();
            $table->text('fisico_obs');
            $table->decimal('pro_fisico', 10, 2);
            $table->decimal('real_fisico', 10, 2);
            $table->decimal('des_fisico', 10, 2);
            $table->text('financiero_obs');
            $table->decimal('pro_fina', 10, 2);
            $table->decimal('real_fina', 10, 2);
            $table->decimal('des_fina', 10, 2);
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
        Schema::dropIfExists('advances');
    }
};
