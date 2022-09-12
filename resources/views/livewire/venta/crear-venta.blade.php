<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario de Venta</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent='' method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label for="fechaVenta">Fecha de Venta</label>
                        <input type="date" class="form-control" name="fechaVenta" wire:model='fechaventa'>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div wire:ignore>
                            <table id="tablaProductos" class="table table-bordered table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th>Valor de Venta</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->valor_venta }}</td>
                                        <td>
                                            <button type="button" class="btn bg-navy btn-sm" wire:click='seleccionarProducto({{ $producto->id }})'>
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($mostrar)
                    <div class="col-md-2">
                        <label for="producto">Producto a Añadir</label>
                        <input readonly type="text" class="form-control" value="{{ $nombreproducto }}">
                    </div>
                    <div class="col-md-1">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" wire:model='cantidad' wire:change='calcularValorTotal'>
                    </div>
                    <div class="col-md-2">
                        <label for="valortotal">Valor Total</label>
                        <input readonly type="number" class="form-control" value="{{ $valortotal }}">
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>