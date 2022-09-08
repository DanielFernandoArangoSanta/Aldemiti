<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Ingresos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
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
                                      
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
