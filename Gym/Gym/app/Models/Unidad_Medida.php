<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad_Medida extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Estado_Unidad_Medida',
    ];

    //relacion con Productos 
    public function productos()
    {
        return $this->hasMany(Producto::class, 'UnidadMedida_Id');
    }
}
