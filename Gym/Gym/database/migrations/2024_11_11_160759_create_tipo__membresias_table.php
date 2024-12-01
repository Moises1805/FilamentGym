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
        Schema::create('tipo__membresias', function (Blueprint $table) {
     $table->id();
     $table->string('Nombre_Tipo'); // Asegúrate de que el tipo de dato coincida
     $table->date('Duracion'); // Suponiendo que también necesitas esta columna
     $table->decimal('Precio',10,2);
     $table->boolean('Estado_Membresia');
   });
}

   
/**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo__membresias');
    }
};
