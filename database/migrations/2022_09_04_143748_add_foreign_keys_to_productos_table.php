<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->foreign(['fk_proveedor'], 'fk_proveedor_producto')->references(['id'])->on('proveedores')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign(['fk_categoria'], 'fk_categoria_producto')->references(['id'])->on('categorias')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('fk_proveedor_producto');
            $table->dropForeign('fk_categoria_producto');
        });
    }
};
