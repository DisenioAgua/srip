<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;
use DB;

class Bitacora extends Model
{
  protected $fillable = ['id_usuario','detalle'];
  protected $dates =['created_at'];

  public static function bitacora($detalle){

    if(Auth::check()==1){
      Bitacora::create([
        'id_usuario'=>Auth::user()->id,
        'detalle'=>$detalle,
      ]);
    }
  }

  public static function nombreUsuario($id){
    $usuarios=User::find($id);
    return $usuarios->name;
  }
  public static function buscar($usuario){
    $bitacora = DB::table('bitacoras')
    ->select('bitacoras.*','users.name')
    ->join('users','bitacoras.id_usuario','=','users.id','left outer')
    ->where('users.name','LIKE','%'.$usuario.'%')
    ->paginate(8);
    return $bitacora;
  }
  public static function buscar2($usuario){//para imprimir
    $bitacora = DB::table('bitacoras')
    ->select('bitacoras.*','users.name')
    ->join('users','bitacoras.id_usuario','=','users.id','left outer')
    ->where('users.name','LIKE','%'.$usuario.'%')
    ->get();
    return $bitacora;
  }

}
