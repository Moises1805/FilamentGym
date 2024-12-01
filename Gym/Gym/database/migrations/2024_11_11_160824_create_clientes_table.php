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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Cedula');
            $table->string('Nombre_Cliente');
            $table->string('Apellido_Cliente');
            $table->string('Telefono');
            $table->string('Domicilio');
            $table->dateTime('Fecha_Registro');
            $table->dateTime('Fecha_Baja')->nullable();
            $table->boolean('Estado_Cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
