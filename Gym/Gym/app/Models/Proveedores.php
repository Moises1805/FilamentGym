<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = "proveedors";

    protected $fillable = [
        'Nombre_Empresa',
        'Nombre_Trabajador',
        'Apellido_Trabajador',
        'Telefono',
        'Correo',
        'Direccion',
        'Estado_Proveedor'
    ];
   
    //Relacion con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'Provedor_Id');
    }
    //relacion Con compras
    public function compras()
    {
        return $this->hasMany(Compra::class, 'Proveedor_Id');
    }  
}
