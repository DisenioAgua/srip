<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    //
      protected $fillable =['compra_id','producto_id','cantidad','precio'];

      public function nombreProducto($id){
        $productos=Producto::find($id);
        return $productos->nombre;
      }
}
