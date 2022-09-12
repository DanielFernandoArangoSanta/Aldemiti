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
        
        if (empty($this->productosavender)) {
            $this->productosavender = collect([['id' => $this->idproducto,
                'nombre' => $this->nombreproducto,
                'valorventa' => $this->valorproducto,
                'cantidad' => $this->cantidad,
                'valortotal' => $this->valortotal
            ]]);
        } else {
            $this->productosavender->push([
                'id' => $this->id,
                'nombre' => $this->nombreproducto,
                'valorventa' => $this->valorproducto,
                'cantidad' => $this->cantidad,
                'valortotal' => $this->valortotal
            ]);
        }
        $this->productosavender->all();
        
    }

    public function guardarProductos()
    {
        $productos = Producto::all();
        $productosVenta = Producto::class;
        foreach ($productos as $producto) {
            $productoVender = $producto;
            foreach ($this->productosavender as $productoventa) {
                if ($productoVender->id == $this->productoventa->id) {
                    //Metodo para almacenar los datos
                }
            }
        }
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
