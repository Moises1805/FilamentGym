<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracione extends Model
{
    use HasFactory;

    protected $fillable = [
        'Usuario_Id',
        'Nombre_Usuario',
        'Telefono',
        'Correo',
        'Direccion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_Id');
    }   
}
