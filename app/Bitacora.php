<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
  protected $fillable = ['id_usuario','detalle'];

  public static function bitacora($detalle){

    if(Auth::check()==1){
      Bitacora::create([
        'id_usuario'=>Auth::user()->id,
        'detalle'=>$detalle,
      ]);
    }
  }
  public static function buscar($id_usuario){
    return Bitacora::id_usuario($id_usuario)->orderBy('created_at')->paginate(8);
  }
  public function scopeId_usuario($query, $id_usuario){
    $query->where('id_usuario', '=', $id_usuario);
  }
  public static function nombreUsuario($id){
    $usuarios=User::find($id);
    return $usuarios->name;
  }

}
