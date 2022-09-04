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
        Schema::create('ingresos_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_producto')->nullable()->index('fk_producto_ingreso');
            $table->unsignedBigInteger('fk_ingreso')->nullable()->index('fk_ingreso_producto');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos_productos');
    }
};
