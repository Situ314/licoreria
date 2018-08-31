<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestroVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestro_venta', function (Blueprint $table) {
            $table->increments('CodVenta');
            $table->integer('Numero');
            $table->date('Fecha')->nullable();
            $table->decimal('Total', 11, 2)->default('0.0');
            $table->integer('CodDespacho')->unsigned();
            $table->foreign('CodDespacho')->references('CodDespacho')->on('despacho');
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
        Schema::dropIfExists('maestro_venta');
    }
}
