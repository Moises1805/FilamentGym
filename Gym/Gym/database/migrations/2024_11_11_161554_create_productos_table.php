<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Proveedor_Id'); // Definir la columna
            $table->unsignedBigInteger('Categoria_Id'); // Definir la columna
            $table->unsignedBigInteger('UnidadMedida_Id'); // Definir la columna
            $table->unsignedBigInteger('Marcas_Id'); // Definir la columna
            $table->unsignedBigInteger('Presentaciones_Id'); // Definir la columna
            $table->unsignedBigInteger('Lotes_Id'); // Definir la columna
            $table->string('nombreProducto');
            $table->text('descripcion');
            $table->decimal('estadoProducto');
            $table->integer('cantidad');
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('Proveedor_Id')->references('id')->on('proveedors')->cascadeOnDelete();
            $table->foreign('Categoria_Id')->references('id')->on('categoria__productos')->cascadeOnDelete();
            $table->foreign('UnidadMedida_Id')->references('id')->on('unidad__medidas')->cascadeOnDelete();
            $table->foreign('Marcas_Id')->references('id')->on('marcas')->cascadeOnDelete();
            $table->foreign('Presentaciones_Id')->references('id')->on('presentaciones')->cascadeOnDelete();
            $table->foreign('Lotes_Id')->references('id')->on('lotes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
