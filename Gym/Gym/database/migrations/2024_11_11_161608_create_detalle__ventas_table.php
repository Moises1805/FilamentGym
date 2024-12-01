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
        Schema::create('detalle__ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Venta_Id');
            $table->unsignedBigInteger('Producto_Id');
            $table->integer('Cantidad');
            $table->decimal('Precio_Unitario', 10, 2);
            $table->decimal('Total_Producto', 10, 2);

            $table->foreign('Venta_Id')->references('id')->on('ventas')->cascadeOnDelete();
            $table->foreign('Producto_Id')->references('id')->on('productos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle__ventas');
    }
};
