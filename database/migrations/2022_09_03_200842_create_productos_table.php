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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->text('codigo');
            $table->mediumText('nombre');
            $table->float('valor_compra');
            $table->float('valor_venta');
            $table->integer('cantidad');
            $table->unsignedBigInteger('fk_proveedor')->nullable()->index('fk_proveedor_producto');
            $table->unsignedBigInteger('fk_categoria')->nullable()->index('fk_categoria_producto');
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
        Schema::dropIfExists('productos');
    }
};
