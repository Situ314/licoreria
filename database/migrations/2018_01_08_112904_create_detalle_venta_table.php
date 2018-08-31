<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->increments('CodDetalleVenta');
            $table->decimal('Precio', 12, 2)->nullable();
            $table->integer('Cantidad');            
            $table->integer('CodVenta')->unsigned();
            $table->foreign('CodVenta')->references('CodVenta')->on('maestro_venta');
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
        Schema::dropIfExists('detalle_venta');
    }
}
