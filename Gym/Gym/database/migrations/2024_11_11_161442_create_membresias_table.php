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
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_membresias');  // Asegúrate de que esta columna exista
            $table->unsignedBigInteger('Cliente_Id');  // Asegúrate de que esta columna exista
            // Claves foráneas
            $table->foreign('tipo_membresias')->references('id')->on('tipo__membresias')->cascadeOnDelete();
            $table->foreign('Cliente_Id')->references('id')->on('clientes')->cascadeOnDelete();
            $table->dateTime('Fecha_Inicio');
            $table->dateTime('Fecha_Fin');
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};
