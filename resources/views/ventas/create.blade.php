<x-app-layout>

  @section('contenido')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ventas.index') }}">Lista de Ventas</a></li>
            <li class="breadcrumb-item active">Crer Venta</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <livewire:venta.crear-venta />
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
        "scrollX": true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
        }
      });
      $('.dataTables_length').addClass('bs-select');
    });
  </script>
  @endsection
</x-app-layout>