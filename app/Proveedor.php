<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // 
    protected $fillable =['nombre','direccion','telefono','nit'];

    public static function buscar($nombre){
      return Proveedor::nombre($nombre)->orderBy('direccion')->paginate(8);
    }

    public function scopeNombre($query, $nombre){
      if(trim($nombre)!=""){
        $query->where('nombre', 'ilike','%'.$nombre.'%')->orWhere('direccion','ilike','%'.$nombre.'%');
      }
    }
}
