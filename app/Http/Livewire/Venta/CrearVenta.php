<?php

namespace App\Http\Livewire\Venta;

use App\Models\Producto;
use Livewire\Component;

class CrearVenta extends Component
{

    public $fechaventa;
    public $productosavender;
    public $mostrar = false;
    public $idproducto;
    public $nombreproducto;
    public $valorproducto;
    public $cantidad;
    public $valortotal;

    public function seleccionarProducto($id)
    {
        $this->reset('idproducto', 'nombreproducto', 'valorproducto', 'cantidad', 'valortotal');
        $this->mostrar =  true;
        $producto = Producto::find($id);
        $this->idproducto = $producto->id;
        $this->nombreproducto = $producto->nombre;
        $this->valorproducto = $producto->valor_venta;
    }

    public function añadirProducto()
    {
        $this->productosavender = collect([
            'fk_producto' => $this->idproducto,
            'cantidad' => $this->cantidad,
            'valortotal' => $this->valortotal
        ]);
    }

    public function calcularValorTotal()
    {
        $this->valortotal = $this->cantidad * $this->valorproducto;
    }

    public function render()
    {
        return view('livewire.venta.crear-venta', [
            'productos' => Producto::all()
        ]);
    }
}
