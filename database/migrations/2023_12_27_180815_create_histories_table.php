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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->text('con_cliente');
            $table->text('sol_adic_cliente');
            $table->text('inf_reun_cliente');
            $table->text('inf_comen_direc');
            $table->dateTime('fecha_creacion');
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
        Schema::dropIfExists('histories');
    }
};
