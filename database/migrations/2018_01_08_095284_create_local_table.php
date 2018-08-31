<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local', function (Blueprint $table) {
            $table->increments('CodLocal');
            $table->string('Nombre', 100);
            $table->string('Descripcion', 100)->nullable();
            $table->string('Contacto', 100);
            $table->string('Correo', 100)->nullable();
            $table->string('Telefono', 20)->nullable();
            $table->string('Celular', 20)->nullable();
            $table->string('Logotipo', 200)->nullable();            
            $table->integer('CodCategoriaL')->unsigned();
            $table->foreign('CodCategoriaL')->references('CodCategoriaL')->on('categoria_local');
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
        Schema::dropIfExists('local');
    }
}
