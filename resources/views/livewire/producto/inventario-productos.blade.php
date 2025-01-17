<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Productos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div wire:ignore>
                        <table id="tablaProductos" class="table table-bordered table-striped table-dark table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Valor de Venta</th>
                                    <th>Cantidad en inventario</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->codigo }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->valor_venta }}</td>
                                        <td>{{ $producto->cantidad }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-sm bg-navy" wire:click='mostrarProducto({{ $producto->id }})'>
                                                        <i class="fas fa-search-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a href="{{ route('inventario.edit', $producto) }}">
                                                        <button type="button" class="btn btn-sm bg-navy">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <form action="{{ route('inventario.delete', $producto) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm bg-navy">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn btn-sm bg-navy" wire:click='mostrarFormulario({{ $producto->id }})'>
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn btn-sm bg-navy" wire:click='mostrarFormularioRetiro({{ $producto->id }})'>
                                                        <i class="fas fa-minus-square"></i>
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
                <div class="col-md-6">
                    @if ($formularioIngreso)
                    <div class="card">
                        <div class="card-header bg-navy">
                            <h6 class="card-title">Ingreso al inventario</h6>
                            <button type="button" class="close bg-navy" aria-label="Close" wire:click='cerrarFormulario'>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='guardarIngreso' method="post">
                                <label for="Producto">{{ $productoSeleccionado->codigo }} -
                                    {{ $productoSeleccionado->nombre }}</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="fechaIngreso">Fecha</label>
                                        <input type="date" class="form-control" name="fechaIngreso" wire:model='fechaIngreso'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="cantidad">Cantidad a Ingresar</label>
                                        <input type="number" class="form-control" name="cantidad" wire:model='cantidad' wire:change='calcularValorTotal'>
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
                    @elseif ($formularioRetiro)
                    <div class="card">
                        <div class="card-header bg-navy">
                            <h6 class="card-title">Retiro de productos</h6>
                            <button type="button" class="close bg-navy" aria-label="Close" wire:click='cerrarFormulario'>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='guardarRetiro' method="post">
                                <label for="Producto">{{ $productoSeleccionado->codigo }} -
                                    {{ $productoSeleccionado->nombre }}</label>
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
                    @elseif ($informacionProducto)
                    <div class="card">
                        <div class="card-header bg-navy">
                            <h6 class="card-title">Información del producto</h6>
                            <button type="button" class="close bg-navy" aria-label="Close" wire:click='cerrarFormulario'>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            {{ $idProducto }}
                            {{ $categoriaProducto }}
                            {{ $nombreProducto }}
                            {{ $codigoProducto }}
                            {{ $medidaProducto }}
                            {{ $valorCompra }}
                            {{ $valorVenta }}
                            {{ $cantidadStock }}
                            {{ $proveedorProducto }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>