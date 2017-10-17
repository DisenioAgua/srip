<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
    protected $fillable =['fecha_compra','num_factura','proveedor_id'];
    protected $dates = ['fecha_compra'];

    public static function buscar($factura){
      return Compra::factura($factura)->orderBy('fecha_compra')->paginate(8);
    }

    public function scopeFactura($query, $factura){
      if(trim($factura)!=""){
        $query->where('num_factura', 'ilike','%'.$factura.'%');
      }
    }

  public function nombreProveedor($id){
    $proveedores=Proveedor::find($id);
    return $proveedores->nombre;
  }

}
