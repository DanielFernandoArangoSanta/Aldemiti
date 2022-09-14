<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Ventas</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div wire:ignore>
                        <table id="tablaVentas" class="table table-bordered table-striped table-dark">
                            <thead>
                                <tr>
                                    <th class="text-center">ID Venta</th>
                                    <th>Fecha de venta</th>
                                    <th>Valor Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fecha_venta }}</td>

                                    <td>{{ $item->productos->sum('pivot.valor_total') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm bg-navy" wire:click='mostrarDetalle({{ $item->id }})'>
                                            Ver Detalle
                                        </button>
                                        <a href="{{ route('ventas.edit', $item) }}">
                                          <button type="button" class="btn btn-sm bg-navy">
                                            <i class="fas fa-edit"></i>
                                          </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-navy">
                            <h3 class="card-title">Detalles de la venta</h3>
                        </div>
                        <div class="card-body">
                            @if($mostrarDetalle)
                            <table class="table table-bordered table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Valor de la Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($venta->productos as $producto)
                                    <tr>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->pivot->cantidad }}</td>
                                        <td>{{ $producto->pivot->valor_total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <label>Valor Total</label>
                            <p>$ {{ $valortotal }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>