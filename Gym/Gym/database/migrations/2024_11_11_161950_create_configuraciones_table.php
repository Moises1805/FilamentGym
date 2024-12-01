<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Usuario_Id'); // Definir la columna Usuario_Id
            $table->string('Nombre_Usuario');
            $table->string('Telefono');
            $table->string('Correo');
            $table->string('Direccion');
            $table->timestamps();

            $table->foreign('Usuario_Id')->references('id')->on('usuarios')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};
