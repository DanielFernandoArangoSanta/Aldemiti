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
        Schema::table('productos_ventas', function (Blueprint $table) {
            $table->foreign(['fk_producto'], 'fk_producto_venta')->references(['id'])->on('productos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign(['fk_venta'], 'fk_venta_producto')->references(['id'])->on('ventas')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos_ventas', function (Blueprint $table) {
            $table->dropForeign('fk_venta_producto');
            $table->dropForeign('fk_producto_venta');
        });
    }
};
