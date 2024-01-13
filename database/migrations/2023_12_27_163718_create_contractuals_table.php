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
        Schema::create('contractuals', function (Blueprint $table) {
            $table->id();
            $table->text('nom_proyecto');
            $table->string('no_contrato', 255);
            $table->string('empresa_cont', 255);
            $table->text('consorcio');
            $table->string('emp_contratante', 255);
            $table->decimal('imp_contrato', 10, 5);
            $table->string('periodo_eject', 255);
            $table->text('descripcion');
            $table->text('convenios')->nullable();
            $table->text('int_coord')->nullable();
            $table->decimal('int_monto', 10, 5)->nullable();
            $table->string('logo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractuals');
    }
};
