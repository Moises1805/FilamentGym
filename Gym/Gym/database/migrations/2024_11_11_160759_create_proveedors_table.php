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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Empresa');
            $table->string('Nombre_Trabajador');
            $table->string('Apellido_Trabajador');
            $table->string('Telefono');
            $table->string('Correo');
            $table->string('Direccion');
            $table->string('Estado_Proveedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
