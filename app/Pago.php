<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
      protected $fillable =['abono'];

      public static function buscar($factura){
        return Ventas::factura($factura)->orderBy('fecha_venta')->paginate(8);
      }
      public function scopeFactura($query, $factura){
        if(trim($factura)!=""){
          $query->where('num_factura', 'ilike','%'.$factura.'%');
        }
      }
      public static function nombreServicio($id){
        $n= Ventas::find($id);
        return $n->nombre;
      }
  
}
