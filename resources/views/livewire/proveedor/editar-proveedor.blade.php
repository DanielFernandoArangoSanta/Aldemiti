<div>
    <form wire:submit.prevent='guardarProveedor' method="post">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nombreProveedor">Nombre del Proveedor</label>
                <input type="text" class="form-control" name="nombreProveedor" wire:model='nombre'>
            </div>
            <div class="form-group col-md-6">
                <label for="telefonoProveedor">Teléfono de contacto</label>
                <input type="text" class="form-control" name="telefonoProveedor" wire:model='telefono'>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-block bg-navy">
                    Guardar
                </button>
            </div>
        </div>
    </form>
</div>