<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_Dañado extends Model
{
    use HasFactory;

    protected $fillable = [
        'Productos_Id',
        'Compras_Id',
        'Ventas_Id',
        'Codigo_Item',
        'Cantidad_Producto_Danados',
        'Motivo'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Productos_Id');
    }

    public function compra()
    {
        return $this->belongsTo(Venta::class, 'Ventas_Id');
    }

}
