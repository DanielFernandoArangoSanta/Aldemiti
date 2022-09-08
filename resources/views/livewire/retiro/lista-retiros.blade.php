<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Retiros</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($mostrarFormulario)
                <div class="col-md-9">
                    @else
                    <div class="col-md-12">
                        @endif
                        <div wire:ignore>
                            <table id="tablaRetiros" class="table table-bordered table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Unidades retiradas</th>
                                        <th>Valor Total</th>
                                        <th>Observación</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($retiros as $retiro)
                                    <tr>
                                        <td>{{ $retiro->id }}</td>
                                        <td>{{ $retiro->fecha_retiro }}</td>
                                        <td>
                                            @if (!is_null($retiro->producto))
                                            {{ $retiro->producto->nombre }}
                                            @else
                                            Producto no registra
                                            @endif
                                        </td>
                                        <td>{{ $retiro->cantidad }}</td>
                                        <td>{{ $retiro->valor_total }}</td>
                                        <td>{{ $retiro->observacion }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <button type="button" class="btn btn-sm bg-navy" wire:click='mostrarFormulario({{ $retiro->id }})'>
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($mostrarFormulario)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-navy">
                                <h6 class="card-title">Retiro de productos</h6>
                                <button type="button" class="close bg-navy" aria-label="Close" wire:click='cerrarFormulario'>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent='actualizarRetiro' method="post">
                                    <label for="Producto">{{ $producto->codigo }} -
                                        {{ $producto->nombre }}</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="fechaRetiro">Fecha</label>
                                            <input type="date" class="form-control" name="fechaRetiro" wire:model='fechaRetiro'>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="cantidadRetiro">Cantidad Retiro</label>
                                            <input type="number" class="form-control" name="cantidad" wire:model='cantidadRetiro' wire:change='calcularValorTotal'>
                                            @if ($valorretiro != 0)
                                            <label>Valor Total</label>
                                            <br>
                                            {{ $valorretiro }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="observacion">Observación</label>
                                            <input type="text" class="form-control" name="observacion" wire:model='observacion'>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6 align-self-start">
                                            <button type="submit" class="btn btn-sm bg-navy">
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
            </div>
        </div>
    </div>