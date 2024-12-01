<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria_Producto extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'Nombre_Categoria',
        'Descripcion',
        'Estado_Categoria'
    ];
//Relacion con Produtos()
    public function productos()
    {
        return $this->hasMany(Producto::class, 'Categoria_Id');
    }
}

