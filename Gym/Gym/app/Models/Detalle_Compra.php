<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Compra extends Model
{
    use HasFactory;


    protected $fillable = [
        'Compra_Id',
        'Productos_Id',
        'Cantidad',
        'Precio Unitario',
        'SubTotal'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'Compra_Id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Producto_Id');
    }
}
