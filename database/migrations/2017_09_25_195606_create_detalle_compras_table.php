<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('compra_id')->unsigned(); //es para declarar elnombre de la variable donde se guardara
            $table->foreign('compra_id')->references('id')->on('compras');// la llave foranea
            $table->integer('producto_id')->unsigned(); //es para declarar elnombre de la variable donde se guardara
            $table->foreign('producto_id')->references('id')->on('productos');// la llave foranea
            $table->string('cantidad');
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
        Schema::dropIfExists('detalle_compras');
    }
}
