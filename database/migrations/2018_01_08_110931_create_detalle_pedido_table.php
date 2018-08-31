<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->increments('CodDetallePedido');
            $table->decimal('Precio', 11, 2)->nullable();
            $table->integer('Cantidad');
            $table->integer('CodPedido')->unsigned();
            $table->foreign('CodPedido')->references('CodPedido')->on('maestro_pedido');
            $table->integer('CodProducto')->unsigned();
            $table->foreign('CodProducto')->references('CodProducto')->on('producto');
            $table->integer('CodPromocion')->nullable()->unsigned();
            $table->foreign('CodPromocion')->references('CodPromocion')->on('promocion');
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
        Schema::dropIfExists('detalle_pedido');
    }
}
