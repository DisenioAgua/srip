<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Servicio;
use App\DetalleServicio;
use App\Producto;
use App\ActivoFijo;
use Response;
use Illuminate\Http\Request;

use App\Http\Requests\ServicioRequest;



class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $servicio = $request->get('servicio');
      $servicios = Servicio::buscar($servicio);
      return view('Servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.create',compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $servicio_nuevo= Servicio::create($request->All());
      $contador=count($request->tipo);
      $tipo=$request->tipo;
      $servicio=$request->servicio;
      $cantidad=$request->cantidad;
      for($i=0;$i<$contador;$i++){
        $detalles= new DetalleServicio;
        $detalles->servicio_id=$servicio_nuevo->id;
        if($tipo[$i]=="producto"){
          $detalles->producto_id=$servicio[$i];
        }else{
          $detalles->activofijo_id=$servicio[$i];
        }
        $detalles->cantidad=$cantidad[$i];
        $detalles->save();
      }
      Bitacora::bitacora("Registro de nuevo servicio: " .$request->nombre);
      return redirect('/servicios')->with('mensaje','Hecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $servicios = Servicio::find($id);
      $detalle_servicios = DetalleServicio::where('servicio_id',$id)->get();
      return view('Servicios.edit',compact('servicios','detalle_servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $servicio_nuevo = Servicio::find($id);
      $servicio_nuevo->fill($request->all());
      $servicio_nuevo->save();
      if (isset($request->servicio)) {
        foreach ($request->servicio as $s => $ser) {
          $detalle_servicio = new DetalleServicio;
          $detalle_servicio->servicio_id=$servicio_nuevo->id;
          if ($request->tipo[$s]=="producto") {
          $detalle_servicio->producto_id=$request->servicio[$s];
        }else{
          $detalle_servicio->activofijo_id=$request->servicio[$s];
        }
          $detalle_servicio->cantidad=$request->cantidad[$s];
          $detalle_servicio->save();
        }
      }
      foreach ($request->cambio as $s => $ser) {
        if ($request->cambio[$s] != 'ninguno') {
          $detalle_servicio = DetalleServicio::findOrFail($request->cambio[$s]);
          $detalle_servicio->delete();

        }
      }

       Bitacora::bitacora("Modificación de servicio: ".$request->nombre);
       return redirect('/servicios')->with('mensaje','Hecho');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $servicios = Servicio::findOrFail($id);
      Bitacora::bitacora("Servicio eliminada: " .$servicios->nombre);
      $servicios->delete();
      return redirect('/servicios');
    }
    public function buscarProducto($id){
      $var = Producto::where('nombre','ilike','%'.$id.'%')->take(2)->get();
      if(count($var)>0){
        return Response::json($var);
      }else{
        return null;
      }
    }
    public function buscarActivo($id){
      $vara = ActivoFijo::distinct('nombre')->where('nombre','ilike','%'.$id.'%')->take(2)->get(['nombre']);
      foreach($vara as $v){
        $buscar=ActivoFijo::where('nombre',$v->nombre)->first();
        $v->id=$buscar->id;
      }
      if(count($vara)>0){
        return Response::json($vara);
      }else{
        return null;
      }
    }

}
