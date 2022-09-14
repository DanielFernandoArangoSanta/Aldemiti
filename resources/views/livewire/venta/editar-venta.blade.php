<div>
    <form wire:submit.prevent='' method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label for="fechaVenta">Fecha de Venta</label>
                <input type="date" class="form-control" name="fechaVenta" wire:model='fechaventa'>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            
          </div>
        </div>
    </form>
</div>
