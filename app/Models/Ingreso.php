<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = "ingresos";
    
    public function producto()
    {
        return $this->hasOne(Producto::class, 'fk_producto');
    }
}
