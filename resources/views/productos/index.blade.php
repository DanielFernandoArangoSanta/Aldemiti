<x-app-layout>
  @section('contenido')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inventario</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Inventario</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Productos</h3>
        </div>
        <div class="card-body">
          <table id="tablaProductos" class="table table-bordered table-striped table-dark">
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
              </tr>
            </thead>
            <tbody>
              @foreach ($productos as $producto)
              <td>{{ $producto->id }}</td>
              <td>{{ $producto->categoria->nombre }}</td>
              <td>{{ $producto->codigo }}</td>
              <td>{{ $producto->nombre }}</td>
              <td>{{ $producto->unidad_medida }}</td>
              <td>{{ $producto->valor_compra }}</td>
              <td>{{ $producto->valor_venta }}</td>
              <td>{{ $producto->cantidad }}</td>
              <td>{{ $producto->proveedor->nombre }}</td>
              <td>
                <div class="row">
                  <div class="col">
                    <a href="{{ route('inventario.edit', $producto) }}">
                      <button type="button" class="btn btn-sm bg-navy">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                  </div>
                  <div class="col">
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
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  @endsection

  @section('js')
  <script>
    $(document).ready(function() {
      $('#tablaProductos').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
        }
      });
    });
  </script>
  @endsection
</x-app-layout>