<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario de Venta</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent='guardarProductos' method="post">
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
                                                <button type="button" class="btn bg-navy btn-sm"
                                                    wire:click='seleccionarProducto({{ $producto->id }})'>
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if ($mostrar)
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="producto">Producto a Añadir</label>
                                    <input readonly type="text" class="form-control" value="{{ $nombreproducto }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" wire:model='cantidad'
                                        wire:change='calcularValorTotal'>
                                </div>
                                <div class="col-md-3">
                                    <label for="valortotal">Valor Total</label>
                                    <input readonly type="number" class="form-control" value="{{ $valortotal }}">
                                </div>
                                <div class="col-md-3 mt-4 p-2">
                                    <button type="button" class="btn btn-sm bg-navy" wire:click='añadirProducto'>
                                        Añadir
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">

                                        </div>
                                        <div class="card-body">
                                            @if (!empty($productosavender))
                                                <ul class="list-group">
                                                    @foreach ($productosavender as $producto)
                                                        <li class="list-group-item">{{ $producto['nombre'] }}
                                                          <button type="button" class="btn btn-sm bg-navy" wire:click='quitarProducto({{ $producto['id'] }})'>
                                                            Quitar
                                                          </button>
                                                        </li>
                                                        
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-sm bg-navy">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                            {{ $productosavender }}
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
