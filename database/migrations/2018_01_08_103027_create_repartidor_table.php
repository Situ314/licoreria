<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepartidorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartidor', function (Blueprint $table) {
            $table->integer('CodRepartidor')->unsigned();
            $table->primary('CodRepartidor');
            $table->string('Nombres', 25);
            $table->string('Apellidos', 25);
            $table->string('CI', 12)->nullable();
            $table->integer('CodLocal')->unsigned();
            $table->foreign('CodLocal')->references('CodLocal')->on('local');
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
        Schema::dropIfExists('repartidor');
    }
}
