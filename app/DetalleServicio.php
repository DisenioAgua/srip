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
}
