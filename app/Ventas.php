<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
      protected $fillable =['num_factura','cliente_id','estado','servicio_id'];
      protected $dates = ['fecha_venta'];

      public static function buscar($factura){
        return Ventas::factura($factura)->orderBy('fecha_venta')->paginate(8);
      }
      public function scopeFactura($query, $factura){
        if(trim($factura)!=""){
          $query->where('num_factura', 'ilike','%'.$factura.'%');
        }
      }
      public static function precio($id){
        $servicio= Servicio::find($id);
        $ganancia = $servicio->ganancia;
        $detalle = DetalleServicio::where('servicio_id','=',$id)->get();
        $acu=0;
       foreach ($detalle as $deta) {
         if ($deta->producto_id == null) {
          $activo= ActivoFijo::find($deta->activofijo_id);
          $palquiler = $activo->precioalquiler;
          $acu+=$palquiler;
        } else {
          $producto= Producto::find($deta->producto_id);
          $pventa = $producto->precio;
          $acu+=$pventa;
        }
       }
       $total=$acu+$ganancia;
       return $total;


      }
      public static function validar($id){
        $pp=Pago::where('ventas_id','=',$id)->get();
        $acu=0;
        foreach ($pp as $p) {
        $acu+=$p->abono;
        }
        $v=Ventas::find($id);
        $t=$v->precio;
        $resta=$t-$acu;
        return $resta;
      }

}
