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

}
