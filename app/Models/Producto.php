<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "productos";

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'fk_proveedor');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_categoria');
    }

    public function ingreso()
    {
        return $this->hasMany(Ingreso::class, 'fk_producto');
    }    

    public function retiro()
    {
        return $this->hasMany(Retiro::class, 'fk_producto');
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'productos_ventas', 'fk_producto', 'fk_venta')->withPivot('cantidad', 'valor_total');
    }

}
