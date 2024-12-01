<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre_Presentacion',
        'Estado_Presentacion'
    ];

    //Reladion  con Productos
    public function productos()
    {
        return $this-> hasMany(Producto::class, 'Presentaciones_Id');
    }
    
}
