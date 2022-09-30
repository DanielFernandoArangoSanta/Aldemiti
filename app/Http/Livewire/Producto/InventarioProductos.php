<?php

namespace App\Http\Livewire\Producto;

use App\Models\Ingreso;
use App\Models\Producto;
use App\Models\Retiro;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class InventarioProductos extends Component
{

    public $productos;
    public $formularioIngreso = false;
    public $formularioRetiro = false;
    public $informacionProducto = false;
    public $productoSeleccionado;
    public $fechaIngreso;
    public $cantidad;
    public $valortotal;
    public $fechaRetiro;
    public $cantidadRetiro;
    public $valorretiro;
    public $observacion;
    public $idProducto;
    public $categoriaProducto;
    public $nombreProducto;
    public $codigoProducto;
    public $medidaProducto;
    public $valorCompra;
    public $valorVenta;
    public $cantidadStock;
    public $proveedorProducto;


    public function mount($productos)
    {
        $this->productos = $productos;
    }

    public function mostrarFormulario($id)
    {
        if ($this->formularioRetiro == true ) {
            $this->formularioRetiro = false;
        }
        $this->formularioIngreso = true;
        $this->productoSeleccionado = Producto::find($id);
    }

    public function mostrarFormularioRetiro($id)
    {
        if ($this->formularioIngreso == true ) {
            $this->formularioIngreso = false;
        }
        $this->formularioRetiro = true;
        $this->productoSeleccionado = Producto::find($id);
    }

    public function mostrarProducto($id)
    {
        if ($this->formularioIngreso == true || $this->formularioRetiro == true) {
            $this->formularioIngreso = false;
            $this->formularioRetiro = false;
        }
        $this->informacionProducto = true;
        $this->productoSeleccionado = Producto::find($id);
        $this->idProducto = $id;
        $this->categoriaProducto = $this->productoSeleccionado->categoria->nombre;
        $this->nombreProducto = $this->productoSeleccionado->nombre;
        $this->codigoProducto = $this->productoSeleccionado->codigo;
        $this->valorCompra = $this->productoSeleccionado->valor_compra;
        $this->valorVenta = $this->productoSeleccionado->valor_venta;
        $this->cantidadStock = $this->productoSeleccionado->cantidad;
        $this->medidaProducto = $this->productoSeleccionado->unidad_medida;
        $this->proveedorProducto = $this->productoSeleccionado->proveedor->nombre;
    }

    public function cerrarFormulario()
    {
        $this->formularioIngreso = false;
        $this->formularioRetiro = false;
        $this->informacionProducto = false;
    }

    public function calcularValorTotal()
    {
        if ($this->formularioIngreso) {
            $this->valortotal = $this->productoSeleccionado->valor_compra * $this->cantidad;
        } elseif ($this->formularioRetiro) {
            $this->valorretiro = $this->productoSeleccionado->valor_compra * $this->cantidadRetiro;
        }

      
    }
    
    public function guardarIngreso()
    {
        $ingreso = new Ingreso();
        $ingreso->fecha_ingreso = $this->fechaIngreso;
        $ingreso->fk_producto = $this->productoSeleccionado->id;
        $ingreso->cantidad = $this->cantidad;
        $ingreso->valor_total = $this->valortotal;
        $ingreso->save();
        $producto = $this->productoSeleccionado;
        $producto->cantidad = $producto->cantidad + $this->cantidad;
        $producto->save();
        return Redirect::route('inventario.index');
    }

    public function guardarRetiro()
    {
        $retiro = new Retiro();
        $retiro->fecha_retiro = $this->fechaRetiro;
        $retiro->fk_producto = $this->productoSeleccionado->id;
        $retiro->cantidad = $this->cantidadRetiro;
        $retiro->valor_total = $this->valorretiro;
        $retiro->observacion = $this->observacion;
        $retiro->save();
        $producto = $this->productoSeleccionado;
        $producto->cantidad = $producto->cantidad - $this->cantidadRetiro;
        $producto->save();
        return Redirect::route('inventario.index');
    }

    public function render()
    {
        return view('livewire.producto.inventario-productos');
    }
}
