<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'Usuario_Id',
        'Proveedor_Id',
        'Fecha_Compra',
        'Costo_TOtal'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_Id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'Proveedor_Id');
    }

    public function detalleCompras()
    {
        return $this->hasMany(Detalle_Compra::class, 'Compra_Id');
    }
}
