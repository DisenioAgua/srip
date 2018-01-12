<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('venta_id')->unsigned(); //es para declarar elnombre de la variable donde se guardara
            $table->foreign('venta_id')->references('id')->on('ventas');// la llave foranea
            $table->integer('servicio_id')->unsigned(); //es para declarar elnombre de la variable donde se guardara
            $table->foreign('servicio_id')->references('id')->on('servicios');// la llave foranea
            $table->text('precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
