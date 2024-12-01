<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    use HasFactory;

    protected $fillable = [
        'TipoMembresia_id',
        'Cliente_Id',
        'Fecha_Inicio',
        'Fecha_Fin'
    ];
    
    public function tipoMembresia()
    {
        return $this->belongsTo(Tipo_Membresia::class, 'tipo_membresia');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Cliente_Id');
    }
}



