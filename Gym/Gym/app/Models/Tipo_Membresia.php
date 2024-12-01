<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_Membresia extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'Nombre_Tipo',
        'Duracion',
        'Precio',
        'Estado_Membresia'
    ];
    //Relacion con Membresias
    public function Membresia(){
        return $this->hasMany(Membresia::class,'tipo_membresias');
    }
}
