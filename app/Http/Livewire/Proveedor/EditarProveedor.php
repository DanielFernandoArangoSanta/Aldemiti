<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class EditarProveedor extends Component
{

    public $idproveedor;
    public $nombre;
    public $telefono;

    public function mount($proveedor)
    {
        $this->idproveedor = $proveedor->id;
        $this->nombre = $proveedor->nombre;
        $this->telefono = $proveedor->tel_contacto;
    }

    public function guardarProveedor()
    {
        $proveedor = Proveedor::find($this->idproveedor);
        $proveedor->nombre = $this->nombre;
        $proveedor->tel_contacto = $this->telefono;
        $proveedor->save();
        return Redirect::route('proveedor.index');
    }

    public function render()
    {
        return view('livewire.proveedor.editar-proveedor');
    }
}
