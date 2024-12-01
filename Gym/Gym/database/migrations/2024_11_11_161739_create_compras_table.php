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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Usuario_Id'); // Definir la columna Usuario_Id
            $table->unsignedBigInteger('Proveedor_Id'); // Definir la columna Proveedor_Id
            $table->dateTime('Fecha_Compra');
            $table->decimal('Costo_Total', 10, 2);
            $table->timestamps();

            $table->foreign('Usuario_Id')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->foreign('Proveedor_Id')->references('id')->on('proveedors')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
