<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha_compra');
            $table->text('num_factura');
            $table->integer('proveedor_id')->unsigned(); //es para declarar elnombre de la variable donde se guardara
            $table->foreign('proveedor_id')->references('id')->on('proveedors');// la llave foranea

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
