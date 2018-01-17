<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bitacora;
use App\Ventas;
use App\Servicio;
use App\Http\Requests\PagoRequest;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $factura = $request->get('factura');
        $pagos = Ventas::buscar($factura);
        return view('Pagos.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $pago= new Pago;
     $venta = Ventas::where('num_factura','=',$request->factura)->first();
     $pago->ventas_id = $venta->id;
     $pago->abono = $request->abono;
     $pago->save();
      Bitacora::bitacora("Registro de nuevo pago: " .$request->nombre);
      return redirect('/pagos')->with('mensaje','Hecho');
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
    public function validar($factura){
      $v=Ventas::where('num_factura','=',$factura)->first();
      $pp=Pago::where('ventas_id','=',$v->id)->get();
      $acu=0;
      foreach ($pp as $p) {
      $acu+=$p->abono;
      }
      $t=$v->precio;
      $resta=$t-$acu;
      return $resta;
    }
}
