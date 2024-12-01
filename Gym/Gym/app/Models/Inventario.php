<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;


    protected $fillable = [
        'Producto_Id',
        'Cantidad_Disponible',
        'Precio_Compra',
        'Precio_Venta',
        'Fecha_Actualizacion',
        'Estado_Inventario'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Producto_Id');
    }
}


