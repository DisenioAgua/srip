<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
  public static function nombreP($id){
    $n= Producto::find($id);
    if(count($n)==1){
      return $n->nombre;

    }else{
      return 0;
    }
  }
  public function activo(){
    return $this->belongsTo('App\ActivoFijo','activofijo_id');
  }
  public function producto(){
    return $this->belongsTo('App\Producto','producto_id');
  }
}
