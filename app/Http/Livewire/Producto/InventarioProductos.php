<?php

namespace App\Http\Livewire\Producto;

use App\Models\Ingreso;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class InventarioProductos extends Component
{

    public $productos;
    public $formularioIngreso = false;
    public $productoSeleccionado;
    public $fechaIngreso;
    public $cantidad;

    public function mount($productos)
    {
        $this->productos = $productos;
    }

    public function mostrarFormulario($id)
    {
        $this->formularioIngreso = true;
        $this->productoSeleccionado = Producto::find($id);
    }

    public function cerrarFormulario()
    {
        $this->formularioIngreso = false;
    }

    public function guardarIngreso()
    {
        $ingreso = new Ingreso();
        $ingreso->fecha_ingreso = $this->fechaIngreso;
        $ingreso->fk_producto = $this->productoSeleccionado->id;
        $ingreso->cantidad = $this->cantidad;
        $ingreso->valor_total = $this->productoSeleccionado->valor_compra * $this->cantidad;
        $ingreso->save();
        $producto = $this->productoSeleccionado;
        $producto->cantidad = $producto->cantidad + $this->cantidad;
        $producto->save();
        return Redirect::route('inventario.index');
    }

    public function render()
    {
        return view('livewire.producto.inventario-productos');
    }
}
