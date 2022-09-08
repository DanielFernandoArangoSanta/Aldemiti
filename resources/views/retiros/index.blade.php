<x-app-layout>
  @section('contenido')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Retiros del inventario</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Lista de Retiros</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <livewire:retiro.lista-retiros :retiros='$retiros' />
    </div>
  </section>
  @endsection

  @section('js')
  <script>
    $(document).ready(function() {
      $('#tablaRetiros').DataTable({
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