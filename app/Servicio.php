<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $fillable = ['nombre', 'ganancia'];

  public static function buscar($nombre){
    return Servicio::nombre($nombre)->orderBy('nombre')->paginate(8);
  }

  public function scopeNombre($query, $nombre){
    if(trim($nombre)!=""){
      $query->where('nombre', 'ilike','%'.$nombre.'%');
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
  public static function validacion($id){
      $detalle = DetalleServicio::where('servicio_id','=',$id)->get();
      foreach ($detalle as $d) {
        if($d->producto_id==null){
          $nombre= ActivoFijo::find($d->activofijo_id);
          $existen=ActivoFijo::where('nombre','=',$nombre->nombre)->count();
          $necesita=$d->cantidad;
          $ventas= Ventas::where('estado','=',true)->get();
          $contador=0;
          foreach ($ventas as $v) {
            $variable=DetalleServicio::where('servicio_id','=',$v->servicio_id )->where('activofijo_id','=',$d->activofijo_id)->first();
            if($variable!=null){
            $contador+=$variable->cantidad;
            }
          }
          $disponible=$existen-$contador;
          if($disponible<$necesita){
            return false;
          }
        }else{
          $compras = DetalleCompra::where('producto_id',$d->producto_id)->get();
          $ingreso = 0;
          foreach($compras as $cmp){
            $ingreso += $cmp->cantidad;
          }
          $egreso = 0;
          $venta= Ventas::get();
          foreach($venta as $vtn){
            $variable = DetalleServicio::where('servicio_id',$vtn->servicio_id)->where('producto_id',$d->producto_id)->first();
            if($variable != null){
              $egreso += $variable->cantidad;
            }
          }
          $necesita = $d->cantidad;
          $existen = $ingreso - $egreso;
          if($existen < $necesita){
            return false;
          }
        }
      }
      return true;
  }

}
