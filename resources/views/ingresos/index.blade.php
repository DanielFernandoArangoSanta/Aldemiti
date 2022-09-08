<x-app-layout>
  @section('contenido')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ingresos al inventario</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Lista de Ingresos</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <livewire:ingreso.lista-ingresos :ingresos='$ingresos'>
    </div>
  </section>
  @endsection

  @section('js')
  <script>
    $(document).ready(function() {
      $('#tablaIngresos').DataTable({
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