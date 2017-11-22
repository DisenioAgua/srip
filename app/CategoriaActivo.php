<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaActivo extends Model
{
  protected $fillable =['codigo','nombre','tipodepreciacion'];

  public static function buscar($nombre){
    return CategoriaActivo::nombre($nombre)->orderBy('nombre')->paginate(8);
  }

  public function scopeNombre($query, $nombre){
    if(trim($nombre)!=""){
      $query->where('nombre', 'ilike','%'.$nombre.'%');
    }
  }
}
