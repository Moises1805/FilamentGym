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
        Schema::create('devolucion__ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Venta_Id'); // Definir la columna Venta_Id
            $table->unsignedBigInteger('Usuario_Id'); // Definir la columna Usuario_Id
            $table->unsignedBigInteger('Producto_Id'); // Definir la columna Producto_Id
            $table->unsignedBigInteger('Cliente_Id'); // Definir la columna Cliente_Id
            $table->date('Fecha_Devolucion'); // Ajuste en el nombre de columna para claridad
            $table->integer('Cantidad_Devuelta'); // Ajuste en el tipo de dato para la cantidad
            $table->text('Motivo'); // Ajuste en el tipo de dato para el motivo
            $table->timestamps();

            $table->foreign('Venta_Id')->references('id')->on('ventas')->cascadeOnDelete();
            $table->foreign('Usuario_Id')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->foreign('Producto_Id')->references('id')->on('productos')->cascadeOnDelete();
            $table->foreign('Cliente_Id')->references('id')->on('clientes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devolucion__ventas');
    }
};
