<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Productos
Route::get('/inventario/index', [ProductoController::class, 'index'])->name('inventario.index');
Route::get('/inventario/crearproducto', [ProductoController::class, 'create'])->name('inventario.create');
Route::post('/inventario/guardar', [ProductoController::class, 'store'])->name('inventario.store');
Route::get('/inventario/{producto}/editar', [ProductoController::class, 'edit'])->name('inventario.edit');
Route::delete('/inventario/{producto}/eliminar', [ProductoController::class, 'destroy'])->name('inventario.delete');

//Proveedores
Route::get('/proveedores/index', [ProveedorController::class, 'index'])->name('proveedor.index');
Route::get('/proveedores/crearproveedor', [ProveedorController::class, 'create'])->name('proveedor.create');
Route::post('/proveedor/guardar', [ProveedorController::class, 'store'])->name('proveedor.store');
Route::get('/proveedor/{proveedor}/editar', [ProveedorController::class, 'edit'])->name('proveedor.edit');
Route::delete('/proveedor/{proveedor}/eliminar', [ProveedorController::class, 'destroy'])->name('proveedor.delete');