<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'Usuario_Id',
        'Cliente_Id',
        'Fecha_Venta',
        'SubTotal',
        'IVA',
        'Descuento',
        'Costo_Total'
    ];
    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'Usuario_Id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Cliente_Id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(Detalle_venta::class, 'Venta_Id');
    }
}




