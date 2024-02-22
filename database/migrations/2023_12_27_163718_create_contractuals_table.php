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
            $table->string('no_contrato', 255)->unique();
            $table->string('empresa_cont', 255);
            $table->text('consorcio')->nullable();
            $table->string('emp_contratante', 255);
            $table->string('coordinacion', 255);
            $table->decimal('imp_contrato', 10, 2);
            $table->text('descripcion')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->bigInteger('total_dias')->nullable();
            $table->text('convenios')->nullable();
            $table->text('int_coord')->nullable();
            $table->decimal('int_monto', 10, 5)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('c_costo', 255)->nullable();
            $table->string('status', 2)->nullable();
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
