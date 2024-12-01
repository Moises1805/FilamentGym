<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'Rol_Id',
    ];
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'Rol_Id');
    }

}
