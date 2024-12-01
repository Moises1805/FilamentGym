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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Usuario_Id');
            $table->unsignedBigInteger('Cliente_Id');
            $table->foreign('Usuario_Id')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->foreign('Cliente_Id')->references('id')->on('clientes')->cascadeOnDelete();
            $table->dateTime('Fecha_Venta');
            $table->decimal('SubTotal', 10, 2);
            $table->decimal('IVA', 10, 2);
            $table->decimal('Descuento_Total', 10, 2);
            $table->decimal('Costo_Total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
