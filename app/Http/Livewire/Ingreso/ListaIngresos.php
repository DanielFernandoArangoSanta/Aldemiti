<?php

namespace App\Http\Livewire\Ingreso;

use Livewire\Component;

class ListaIngresos extends Component
{

    public $ingresos;

    public function mount($ingresos)
    {
      $this->ingresos = $ingresos;
    }

    public function render()
    {
        return view('livewire.ingreso.lista-ingresos');
    }
}
