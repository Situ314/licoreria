<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('CodCliente')->unsigned();
            $table->primary('CodCliente');
            $table->string('Nombre', 50);
            $table->string('NIT', 12)->nullable();
            $table->string('Numero', 10)->nullable();
            $table->string('Referencia', 200)->nullable();
            $table->decimal('Latitud', 10, 6)->nullable();
            $table->decimal('Longitud', 10, 6)->nullable();
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
        Schema::dropIfExists('cliente');
    }
}
