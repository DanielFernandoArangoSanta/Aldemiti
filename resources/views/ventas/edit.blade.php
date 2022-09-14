<x-app-layout>
  @section('contenido')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ventas.index') }}">Inventario</a></li>
            <li class="breadcrumb-item active">Editar Venta</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-navy">
          <h3 class="card-title">Formulario de Venta</h3>
        </div>
        <div class="card-body">
          <livewire:venta.editar-venta :venta='$ventaAEditar' />
        </div>
      </div>
    </div>
  </section>

  @endsection
</x-app-layout>