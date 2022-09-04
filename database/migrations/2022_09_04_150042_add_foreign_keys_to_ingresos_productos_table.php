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
        Schema::table('ingresos_productos', function (Blueprint $table) {
            $table->foreign(['fk_producto'], 'fk_producto_ingreso')->references(['id'])->on('productos');
            $table->foreign(['fk_ingreso'], 'fk_ingreso_producto')->references(['id'])->on('ingresos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingresos_productos', function (Blueprint $table) {
            $table->dropForeign('fk_producto_ingreso');
            $table->dropForeign('fk_ingreso_producto');
        });
    }
};
