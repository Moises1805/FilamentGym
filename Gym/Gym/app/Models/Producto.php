<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'Proveedor_Id',
        'Categoria_Id',
        'UnidadMedida_Id',
        'Marcas_Id',
        'Presentaciones_Id',
        'Lotes_Id',
        'nombreProducto',
        'descripcion',
        'estadoProducto',
        'cantidad',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'Proveedor_Id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria_Producto::class, 'Categoria_Id');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(Unidad_Medida::class, 'UnidadMedida_Id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'Marcas_Id');
    }

    public function presentacion()
    {
        return $this->belongsTo(Presentacion::class, 'Presentaciones_Id');
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'Lotes_Id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(Detalle_Venta::class, 'Producto_Id');
    }

}
