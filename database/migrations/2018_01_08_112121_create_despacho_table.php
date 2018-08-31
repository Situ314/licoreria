<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespachoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despacho', function (Blueprint $table) {
            $table->increments('CodDespacho');
            $table->char('Estado', 1)->nullable();            
            $table->integer('CodPedido')->unsigned();
            $table->foreign('CodPedido')->references('CodPedido')->on('maestro_pedido');
            $table->integer('CodRepartidor')->unsigned();
            $table->foreign('CodRepartidor')->references('CodRepartidor')->on('repartidor');
            $table->integer('CodDespachador')->unsigned();
            $table->foreign('CodDespachador')->references('CodDespachador')->on('despachador');
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
        Schema::dropIfExists('despacho');
    }
}
