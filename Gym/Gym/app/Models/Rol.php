<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre_Rol',
        'Descripcion',
    ];
    //Relacion con UserRoles()
    
     public function userRoles()
    {
       return $this->hasMany(UserRole::class, 'Rol_Id');
    }
}
