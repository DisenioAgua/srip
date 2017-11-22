<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
      protected $fillable = ['nombre', 'apellido', 'direccion','telefono','dui'];

      public static function buscar($nombre){
        return Cliente::nombre($nombre)->orderBy('apellido')->paginate(8);
      }

      public function scopeNombre($query, $nombre){
        if(trim($nombre)!=""){
          $query->where('nombre', 'ilike','%'.$nombre.'%')->orWhere('apellido','ilike','%'.$nombre.'%');
        }
      }

}
