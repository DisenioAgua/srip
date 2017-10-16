<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Compra; //para poder usar el modelo
use App\Proveedor;
use Redirect;
use App\Producto;
use App\DetalleCompra;
use App\Bitacora;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores= Proveedor::orderBy('nombre','asc')->get();
          return view('compras.create',compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $compra= Compra::create($request->All());
      if(isset($request->codigo)){
        foreach ($request->codigo as $c => $com) {
          $detalle_compra = new DetalleCompra;
          $detalle_compra->compra_id=$compra->id;
          $producto = Producto::where('codigo',$request->codigo[$c])->first();
          $detalle_compra->producto_id=$producto->id;
          $detalle_compra->cantidad=$request->cantidad[$c];
          $detalle_compra->precio=$request->precio[$c];
          $detalle_compra->save();
        }
      }num_factura
      Bitacora::bitacora("Registro de nueva compra n° de factura: " .$request->num_factura);
      return redirect('/compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function nombreProducto($id){
      $producto=Producto::where('codigo',$id)->first();
      if($producto!=null){

        return $producto->nombre;
      }else{
        return "El producto no existe";
      }
    }
}
