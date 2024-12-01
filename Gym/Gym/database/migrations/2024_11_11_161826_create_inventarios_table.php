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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Producto_Id'); // Definir la columna Producto_Id
            $table->string('Cantidad_Disponible');
            $table->string('Precio_Compra');
            $table->string('Precio_Venta');
            $table->string('Fecha_Actualizacion');
            $table->string('Estado_Inventario');
            $table->timestamps();

            $table->foreign('Producto_Id')->references('id')->on('productos');
        });       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
