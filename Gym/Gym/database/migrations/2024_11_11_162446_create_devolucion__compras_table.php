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
        Schema::create('devolucion__compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Compra_Id'); // Definir la columna Compra_Id
            $table->unsignedBigInteger('Usuario_Id'); // Definir la columna Usuario_Id
            $table->unsignedBigInteger('Proveedor_Id'); // Definir la columna Proveedor_Id
            $table->unsignedBigInteger('Producto_Id'); // Definir la columna Producto_Id
            $table->date('Fecha_Devolucion'); // Ajuste en el nombre de columna para claridad
            $table->integer('Cantidad'); // Ajuste en el tipo de dato para la cantidad
            $table->text('Motivo'); // Ajuste en el tipo de dato para el motivo
            $table->timestamps();

            $table->foreign('Compra_Id')->references('id')->on('compras')->cascadeOnDelete();
            $table->foreign('Usuario_Id')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->foreign('Proveedor_Id')->references('id')->on('proveedors')->cascadeOnDelete();
            $table->foreign('Producto_Id')->references('id')->on('productos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devolucion__compras');
    }
};
