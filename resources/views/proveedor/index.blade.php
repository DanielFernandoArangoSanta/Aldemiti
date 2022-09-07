<x-app-layout>
  @section('contenido')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proveedores</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Proveedores</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Proveedores</h3>
        </div>
        <div class="card-body">
          <table id="tablaProveedores" class="table table-bordered table-striped table-dark">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Nombre</th>
                <th>Telefono de Contacto</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($proveedores as $proveedor)
              <tr>
                <td>{{ $proveedor->id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->tel_contacto }}</td>
                <td>
                  <div class="row">
                    <div class="col">
                      <a href="{{ route('proveedor.edit', $proveedor) }}">
                        <button type="button" class="btn btn-sm bg-navy">
                          <i class="fas fa-edit"></i>
                        </button>
                      </a>
                    </div>
                    <div class="col">
                      <form action="{{ route('proveedor.delete', $proveedor) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm bg-navy">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
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
      $('#tablaProveedores').DataTable({
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