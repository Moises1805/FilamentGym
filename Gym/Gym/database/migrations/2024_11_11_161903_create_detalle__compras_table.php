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
        Schema::create('detalle__compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Compra_Id'); // Definir la columna Compra_Id
            $table->unsignedBigInteger('Productos_Id'); // Definir la columna Productos_Id
            $table->integer('Cantidad'); 
            $table->decimal('Precio_Unitario', 10, 2); // Corregir nombre de columna para sintaxis correcta
            $table->decimal('SubTotal', 10, 2);
            $table->timestamps();

            $table->foreign('Compra_Id')->references('id')->on('compras')->cascadeOnDelete();  
            $table->foreign('Productos_Id')->references('id')->on('productos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle__compras');
    }
};
