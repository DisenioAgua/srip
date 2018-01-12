<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivoFijo extends Model
{
  protected $fillable =['nombre','codigo','tipoactivo','categoria_id','precio','cantidad','fecha_compra','precioalquiler','estado'];
  protected $dates = ['fecha_compra'];
  public static function buscar($nombre){
    return ActivoFijo::nombre($nombre)->orderBy('nombre')->paginate(8);
  }

  public function scopeNombre($query, $nombre){
    if(trim($nombre)!=""){
      $query->where('nombre', 'ilike','%'.$nombre.'%');
    }
  }
  public static function CodigoCategoria($id){
    $v=CategoriaActivo::find($id);
    return $v->codigo;
  }
}
