<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'Numero_Lote',
        'Fecha vencimiento',
        'Descripcion',
        'Cantidad'
    ];

    //Relacion con Productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'Lotes_Id');
    }
}
