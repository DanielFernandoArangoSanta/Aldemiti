<x-app-layout>
  @section('contenido')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Añadir Producto</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventario.index') }}">Inventario</a></li>
            <li class="breadcrumb-item active">Añadir Producto</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-navy">
          <h3 class="card-title">Formulario de Producto</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('inventario.store') }}" method="post">
            @csrf
            <div class="row align-items-center justify-content-start">
              <div class="form-group col-md-8">
                <label for="categoriaProducto">¿A que categoría pertenece el producto?</label>
                <select class="form-control" name="categoriaProducto">
                  <option disabled selected>Seleccione una categoría</option>
                  @foreach ($categorias as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <livewire:categoria.crear-categoria />
            <div class="row mt-2">
              <div class="form-group col-md-6">
                <label for="codigoProducto">Código</label>
                <input type="text" class="form-control" name="codigoProducto">
              </div>
              <div class="form-group col-md-4">
                <label for="nombreProducto">Nombre del producto</label>
                <input type="text" class="form-control" name="nombreProducto">
              </div>
              <div class="form-group col-md-2">
                <label for="unidadMedida">Unidad de Medida</label>
                <select class="form-control" name="unidadMedida">
                  <option disabled selected>Seleccione la unidad de medida</option>
                  <option value="Unidad">Unidad</option>
                  <option value="Libra">Libra</option>
                  <option value="Kilo">Kilo</option>
                  <option value="Arroba">Arroba</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="valorCompra">Valor de Producto</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="number" class="form-control" min="1" step="any" name="valorCompra">
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="valorVenta">Valor de Venta</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="number" class="form-control" min="1" step="any" name="valorVenta">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="stockInventario">Cantidad en Inventario</label>
                <input type="number" class="form-control" min="1" name="stockInventario">
              </div>
              <div class="form-group col-md-6">
                <label for="proveedorProducto">Proveedor</label>
                <select class="form-control" name="proveedorProducto">
                <option disabled selected>Seleccione un proveedor</option>
                @foreach ($proveedores as $proveedor)
                  <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
                </select>
                <br>
                <a href="{{ route('proveedor.create') }}">
                  <button type="button" class="btn btn-block btn-sm bg-navy">
                    Crear Proveedor
                  </button>
                </a>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-block btn-sm bg-navy">
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