<?php

namespace App\Http\Livewire\Venta;

use Livewire\Component;

class ListaVentas extends Component
{

    public $ventas;

    public function mount($ventas)
    {
        $this->ventas = $ventas;
    }

    public function render()
    {
        return view('livewire.venta.lista-ventas');
    }
}
