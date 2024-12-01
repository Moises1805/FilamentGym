<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    protected $fillable = [
        'Nombre_usuario',
        'Contrasena',
        'Estado_Usuario',
    ];
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'Usuario_Id');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'Usuario_Id');
    }
}
