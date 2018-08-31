<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestroPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestro_pedido', function (Blueprint $table) {
            $table->increments('CodPedido');
            $table->integer('Numero');
            $table->dateTime('FechaHora')->nullable();
            $table->integer('CodDespachador')->unsigned();
            $table->foreign('CodDespachador')->references('CodDespachador')->on('despachador');
            $table->integer('CodCliente')->unsigned();
            $table->foreign('CodCliente')->references('CodCliente')->on('cliente');
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
        Schema::dropIfExists('maestro_pedido');
    }
}
