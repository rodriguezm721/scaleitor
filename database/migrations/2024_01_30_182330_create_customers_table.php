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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nom_cliente', 255);
            $table->string('cargo', 255);
            $table->string('empresa', 255);
            $table->string('email');
            $table->string('num_tel');
            $table->timestamps();

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')
            ->onDelete('cascade') // Eliminación en cascada
            ->onUpdate('cascade'); // Actualización en cascada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
