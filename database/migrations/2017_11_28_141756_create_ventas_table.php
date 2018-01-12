<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha_venta');
            $table->text('num_factura');
            $table->integer('cliente_id')->unsigned(); //es para declarar elnombre de la variable donde se guardara
            $table->foreign('cliente_id')->references('id')->on('clientes');// la llave foranea
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
