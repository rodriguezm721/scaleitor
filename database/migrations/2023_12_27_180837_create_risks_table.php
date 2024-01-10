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
        Schema::create('risks', function (Blueprint $table) {
            $table->id();
            $table->text('riesgo');
            $table->decimal('impacto', 10, 2);
            $table->decimal('frecuencia', 10, 2);
            $table->text('mitigacion');
            $table->timestamps();

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risks');
    }
};
