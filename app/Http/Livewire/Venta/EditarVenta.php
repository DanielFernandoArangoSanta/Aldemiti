<?php

namespace App\Http\Livewire\Venta;

use Livewire\Component;

class EditarVenta extends Component
{

    public $ventaAEditar;
    public $fechaventa;

    public function mount($venta)
    {
      $this->ventaAEditar = $venta;
      $this->fechaventa = $this->ventaAEditar->fecha_venta;
    }

    public function render()
    {
        return view('livewire.venta.editar-venta');
    }
}
