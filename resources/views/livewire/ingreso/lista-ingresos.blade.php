<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Ingresos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($mostrarFormulario)
                    <div class="col-md-9">
                    @else
                        <div class="col-md-12">
                @endif
                <div wire:ignore>
                    <table id="tablaIngresos" class="table table-bordered table-striped table-dark">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Unidades ingresadas</th>
                                <th>Valor Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingresos as $ingreso)
                                <tr>
                                    <td>{{ $ingreso->id }}</td>
                                    <td>{{ $ingreso->fecha_ingreso }}</td>
                                    <td>
                                        @if (!is_null($ingreso->producto))
                                            {{ $ingreso->producto->nombre }}
                                        @else
                                            Producto no registra
                                        @endif
                                    </td>
                                    <td>{{ $ingreso->cantidad }}</td>
                                    <td>{{ $ingreso->valor_total }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-sm bg-navy"
                                                    wire:click='mostrarFormulario({{ $ingreso->id }})'>
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
                            <h6 class="card-title">Editar Ingreso</h6>
                            <button type="button" class="close bg-navy" aria-label="Close"
                                wire:click='cerrarFormulario'>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='actualizarIngreso' method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="Producto">{{ $producto->codigo }} - {{ $producto->nombre }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="fechaIngreso">Fecha de Ingreso</label>
                                        <input type="date" class="form-control" name="fechaIngreso"
                                            wire:model='fechaIngreso'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cantidad">Cantidad ingresada</label>
                                        <input type="number" class="form-control" name="cantidad" wire:model='cantidad'
                                            wire:change='calcularValorTotal'>
                                        @if ($valortotal != 0)
                                            <label>Valor Total</label>
                                            <br>
                                            {{ $valortotal }}
                                        @endif
                                    </div>
                                    <div class="col-md-6 align-self-end">
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
