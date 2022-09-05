<x-app-layout>
  @section('contenido')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Añadir Proveedor</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('proveedor.index') }}">Proveedores</a></li>
            <li class="breadcrumb-item active">Añadir Proveedor</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-navy">
          <h3 class="card-title">Formulario de Proveedor</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('proveedor.store') }}" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <label for="nombreProveedor">Nombre del Proveedor</label>
                <input type="text" class="form-control" name="nombreProveedor">
              </div>
              <div class="form-group col-md-6">
                <label for="telefonoProveedor">Teléfono de contacto</label>
                <input type="text" class="form-control" name="telefonoProveedor">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <button type="submit" class="btn btn-block bg-navy">
                  Guardar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
</x-app-layout>