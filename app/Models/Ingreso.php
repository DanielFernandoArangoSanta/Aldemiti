<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = "ingresos";
    
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'ingresos_productos')->withPivot('cantidad');
    }
}
