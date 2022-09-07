<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Productos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($formularioIngreso)
                <div class="col-md-9">
                    @else
                    <div class="col-md-12">
                        @endif
                        <div wire:ignore>
                            <table id="tablaProductos" class="table table-bordered table-striped table-dark table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Categoría</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Medida</th>
                                        <th>Valor de Compra</th>
                                        <th>Valor de Venta</th>
                                        <th>Cantidad en inventario</th>
                                        <th>Proveedor</th>
                                        <th>Opciones</th>
                                        @if (!$formularioIngreso)
                                        <th>Ingresar Productos</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->categoria->nombre }}</td>
                                        <td>{{ $producto->codigo }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->unidad_medida }}</td>
                                        <td>{{ $producto->valor_compra }}</td>
                                        <td>{{ $producto->valor_venta }}</td>
                                        <td>{{ $producto->cantidad }}</td>
                                        <td>
                                            @if (!is_null($producto->proveedor))
                                            {{ $producto->proveedor->nombre }}
                                            @else
                                            Proveedor no registra
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="{{ route('inventario.edit', $producto) }}">
                                                        <button type="button" class="btn btn-sm bg-navy">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <form action="{{ route('inventario.delete', $producto) }}" method="post">
                                                        @method("DELETE")
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm bg-navy">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-sm bg-navy" wire:click='mostrarFormulario({{ $producto->id }})'>
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($formularioIngreso)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-navy">
                                <h6 class="card-title">Ingreso al inventario</h6>
                                <button type="button" class="close bg-navy" aria-label="Close" wire:click='cerrarFormulario'>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent='guardarIngreso' method="post">
                                    <label for="Producto">{{ $productoSeleccionado->codigo }} - {{ $productoSeleccionado->nombre }}</label>
                                    <div class="row">
                                        <label for="fechaIngreso">Fecha</label>
                                        <input type="date" class="form-control" name="fechaIngreso" wire:model='fechaIngreso'>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="cantidad">Cantidad a Ingresar</label>
                                            <input type="number" class="form-control" name="cantidad" wire:model='cantidad'>
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