<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'Cedula',
        'Nombre_Cliente',
        'Apellido_Cliente',
        'Telefono',
        'Domicilio',
        'Fecha_Registro',
        'Fecha_Baja',
        'Estado_Cliente'
    ];

    //Relacion con Membresias
    public function membresias()
    {
        return $this->hasMany(Membresia::class, 'Cliente_Id');
    }
    //Relacion Con Ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'Cliente_Id');
    }
    //Relacion Con compras
    public function devoluciones()
    {
        return $this->hasMany(Devolucion_Venta::class, 'Cliente_Id');
    }  
}
