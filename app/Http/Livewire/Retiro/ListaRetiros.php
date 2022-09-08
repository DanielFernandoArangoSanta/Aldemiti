<?php

namespace App\Http\Livewire\Retiro;

use App\Models\Producto;
use App\Models\Retiro;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ListaRetiros extends Component
{

    public $retiros;
    public $mostrarFormulario = false;
    public $retiroSeleccionado;
    public $producto;
    public $fechaRetiro;
    public $cantidadRetiro;
    public $valorretiro;
    public $observacion;

    public function mount($retiros)
    {
        $this->retiros = $retiros;
    }

    public function mostrarFormulario($id)
    {
        $this->mostrarFormulario = true;
        $this->retiroSeleccionado = Retiro::find($id);
        $this->producto = Producto::find($this->retiroSeleccionado->fk_producto);
        $this->fechaRetiro = $this->retiroSeleccionado->fecha_retiro;
        $this->cantidadRetiro = $this->retiroSeleccionado->cantidad;
        $this->valorretiro = $this->retiroSeleccionado->valor_total;
        $this->observacion = $this->retiroSeleccionado->observacion;
    }

    public function cerrarFormulario()
    {
      $this->mostrarFormulario = false;
    }

    public function calcularValorTotal()
    {
        $this->valorretiro = $this->producto->valor_compra * $this->cantidadRetiro;
    }

    public function actualizarRetiro()
    {
        $retiro = Retiro::find($this->retiroSeleccionado->id);
        $retiro->fecha_retiro = $this->fechaRetiro;
        $retiro->fk_producto = $this->producto->id;
        $producto = $this->producto;
        if ($this->cantidadRetiro > $retiro->cantidad) {
            $cantidadaretirar = $this->cantidadRetiro - $retiro->cantidad;
            $producto->cantidad = $producto->cantidad - $cantidadaretirar;
        } elseif ($this->cantidadRetiro < $retiro->cantidad) {
            $cantidadaingresar = $retiro->cantidad - $this->cantidadRetiro;
            $producto->cantidad = $producto->cantidad + $cantidadaingresar;
        }
        $retiro->cantidad = $this->cantidadRetiro;
        $retiro->valor_total = $this->valorretiro;
        $retiro->observacion = $this->observacion;
        $retiro->save();
        $producto->save();
        return Redirect::route('retiros.index');
    }

    public function render()
    {
        return view('livewire.retiro.lista-retiros');
    }
}
