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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
           $table->integer('documento');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('latitud');
            $table->string('longitud');
            $table->bigInteger('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete('cascade');
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
        Schema::dropIfExists('clientes');
    }
};
