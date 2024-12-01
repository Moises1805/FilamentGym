<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion_Compra extends Model
{
    use HasFactory;


    protected $fillable = [
        'Compra_Id',
        'Usuario_Id',
        'Proveedor_Id',
        'Producto_Id',
        'Fecha Devolucion Compra',
        'Cantidad',
        'Motivo'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'Compra_Id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_Id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'Proveedor_Id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Producto_Id');
    }
}
