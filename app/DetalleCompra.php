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
       public static function existeProducto($id){
         $contador = DetalleCompra::where('producto_id','=',$id)->count();
         return $contador;
       }
}
