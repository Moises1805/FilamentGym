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
        Schema::create('productos__dañados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Productos_Id'); // Definir la columna Productos_Id
            $table->unsignedBigInteger('Compras_Id'); // Definir la columna Compras_Id
            $table->unsignedBigInteger('Ventas_Id'); // Definir la columna Ventas_Id
            $table->integer('Codigo_Item');
            $table->integer('Cantidad_Producto_Danados');
            $table->string('Motivo');
            $table->timestamps();

            $table->foreign('Productos_Id')->references('id')->on('productos')->cascadeOnDelete();
            $table->foreign('Compras_Id')->references('id')->on('compras')->cascadeOnDelete();
            $table->foreign('Ventas_Id')->references('id')->on('ventas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos__dañados');
    }
};
