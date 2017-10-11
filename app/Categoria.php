<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable =['nombre','descripcion'];

    public static function buscar($nombre){
      return Categoria::nombre($nombre)->orderBy('descripcion')->paginate(8);
    }

    public function scopeNombre($query, $nombre){
      if(trim($nombre)!=""){
        $query->where('nombre', 'ilike','%'.$nombre.'%')->orWhere('descripcion','ilike','%'.$nombre.'%');
      }
    }
}
