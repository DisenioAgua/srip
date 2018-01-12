<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
  public function activo(){
    return $this->belongsTo('App\ActivoFijo','activofijo_id');
  }
  public function producto(){
    return $this->belongsTo('App\Producto','producto_id');
  }
  public static function nombreProductos($id){
    $n= Producto::find($id);
    return $n->nombre;
  }
  public static function nombreActivos($id){
    $n= ActivoFijo::find($id);
    return $n->nombre;
  }
}
