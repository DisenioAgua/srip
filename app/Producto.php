<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable =['codigo','nombre','categoria_id','ruta','precio'];

    public static function buscar($nombre){
      return Producto::nombre($nombre)->orderBy('codigo')->paginate(8);
    }

    public function scopeNombre($query, $nombre){
      if(trim($nombre)!=""){
        $query->where('nombre', 'ilike','%'.$nombre.'%')->orWhere('codigo','ilike','%'.$nombre.'%');
      }
    }
    public static function nombreCategorias($id){
      $n= Categoria::find($id);
      return $n->nombre;
    }
    public static function nombreCategorias2($id){
      $n= Categoria::find($id);
      return $n->descripcion;
    }
}
