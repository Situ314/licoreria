<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('CodProducto');
            $table->string('Nombre', 100);
            $table->string('Descripcion', 200)->nullable();
            $table->decimal('Precio', 11, 2)->nullable();
            $table->string('Foto', 200)->nullable();
            $table->char('Disponible', 1)->default('S');
            $table->char('Activo', 1)->default('S');
            $table->integer('CodLocal')->unsigned();
            $table->foreign('CodLocal')->references('CodLocal')->on('local');
            $table->integer('CodCategoriaP')->unsigned();
            $table->foreign('CodCategoriaP')->references('CodCategoriaP')->on('categoria_producto');
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
        Schema::dropIfExists('producto');
    }
}
