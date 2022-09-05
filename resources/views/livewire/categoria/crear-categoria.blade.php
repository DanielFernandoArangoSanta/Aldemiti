<div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-round btn-md bg-navy" wire:click='mostrarFormulario'>
                Añadir Categoría
            </button>
        </div>
    </div>
    @if ($mostrarFormulario)
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
            <form wire:submit.prevent='guardarCategoria' method="post">
                <div class="row align-items-center justify-content-center mt-2">
                    <div class="form-group col-sm-6">
                        <label for="nombreCategoria">Nombre de Categoria</label>
                        <input type="text" class="form-control" name="nombreCategoria" wire:model='nombre'>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-block bg-navy">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    @endif
</div>