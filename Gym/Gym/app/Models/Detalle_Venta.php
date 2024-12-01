<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'Venta_Id',
        'Producto_Id',
        'Cantidad',
        'Precio_Unitario',
        'Total_Producto',
    ];

    public function venta()
    {
        return $this->belongsTo(venta::class, 'Vdenta_Id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Producto_Id');
    }

}
