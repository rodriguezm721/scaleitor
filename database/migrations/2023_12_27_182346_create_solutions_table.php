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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 60);
            $table->text('observaciones');
            $table->text('asolucion');
            $table->dateTime('fecha_creacion');
            $table->timestamps();

            $table->unsignedBigInteger('advance_id');
            $table->foreign('advance_id')->references('id')->on('advances')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};
