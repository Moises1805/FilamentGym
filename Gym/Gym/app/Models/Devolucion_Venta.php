<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion_Venta extends Model
{
    use HasFactory;

    protected $fillable= [
        'Venta_Id',
        'Usuario_Id',
        'Producto_Id',
        'Cliente_Id',
        'Fecha Devolucion de Venta',
        'Cantidad Devuelta',
        'Motivo'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'Venta_Id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_Id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Producto_Id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Cliente_Id');
    }
}
