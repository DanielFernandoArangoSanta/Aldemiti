<?php

namespace App\Http\Livewire\Venta;

use App\Models\Venta;
use Livewire\Component;

class ListaVentas extends Component
{

    public $ventas;
    public $mostrarDetalle = false;
    public $valortotal;
    public $venta;

    public function mount($ventas)
    {
        $this->ventas = $ventas;
    }

    public function mostrarDetalle($id)
    {
        $this->reset(['valortotal', 'venta']);
        $this->mostrarDetalle = true;
        $this->venta = Venta::with('productos')->findOrFail($id);
        $this->valortotal = $this->venta->productos->sum('pivot.valor_total');
    }

    public function render()
    {
        return view('livewire.venta.lista-ventas');
    }
}
