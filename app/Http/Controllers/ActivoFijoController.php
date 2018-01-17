<?php

namespace App\Http\Controllers;

use App\ActivoFijo;
use Illuminate\Http\Request;

use App\Bitacora;
use Input;
use App\Http\Controllers\Controller;
use App\CategoriaActivo;
use Redirect;
use App\Http\Requests\ActivoFijoRequest;
use DB;

class ActivoFijoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $nombre = $request->get('nombre');
      $activofijos = ActivoFijo::buscar($nombre);
      return view('ActivoFijo.index',compact('activofijos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categoriaactivos= CategoriaActivo::orderBy('nombre','asc')->get();
        return view('ActivoFijo.create',compact('categoriaactivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivoFijoRequest $request)
    {
      DB::beginTransaction();
      try {
        $registro= ActivoFijo::where('categoria_id',$request->categoria_id)->max('codigo');
        if(count($registro)>0){
          $correlativo=$registro+1;
        }else{
          $correlativo=1;
        }
        for ($i=0; $i <$request->cantidad ; $i++) {
          $activo= new ActivoFijo;
          $activo->codigo=$correlativo+$i;
          $activo->fecha_compra=$request->fecha_compra;
          $activo->categoria_id=$request->categoria_id;
          $activo->nombre=$request->nombre;
          $activo->tipoactivo=$request->tipoactivo;
          $activo->precio=$request->precio;
          $activo->cantidad=0;
          $activo->precioalquiler=$request->precioalquiler;
          $activo->save();
          DB::commit();
          Bitacora::bitacora("Registro de nuevo activo: " .$request->nombre);
        }
      } catch (Exception $e) {
        DB::rollback();
        return redirect('/activofijos')->with('mensaje','Algo Salio Mal');
      }
      return redirect('/activofijos')->with('mensaje','Hecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActivoFijo  $activoFijo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $activo = ActivoFijo::find($id);
      return view('ActivoFijo.show',compact('activo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActivoFijo  $activoFijo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categoriaactivos= CategoriaActivo::orderBy('nombre','asc')->get();
      $activofijos = ActivoFijo::find($id);
      return view('ActivoFijo.edit',compact('activofijos','categoriaactivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActivoFijo  $activoFijo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $men['nombre.required']='El campo Nombre es obligatorio';
      $men['nombre.min']='El Nombre debe tener mínimo 4  caracteres';
      $men['nombre.max']='El Nombre debe tener máximo 20  caracteres';

      $men['categoria_id.not_in']='Seleccione una opción válida';

      $men['precio.required']='El campo Precio es obligatorio';

     $men['precioalquiler.required']='El campo Precio de alquiler es obligatorio';



      $v1=$v2=$v3=0;


      $activofijos = ActivoFijo::find($id);
      if ($activofijos['nombre']==$request['nombre']) {
        $validar['nombre']='required | min:4 | max:20';
        $v1=1;
      }
      else {
          $validar['nombre']='required | min:4 | max:20';
      }


      if ($activofijos['precio']==$request['precio']) {
        $validar['precio']='required';
        $v2=1;
      }
      else {
          $validar['precio']='required';
      }
      if ($activofijos['precioalquier']==$request['precioalquiler']) {
        $validar['precioalquiler']='required';
        $v3=1;
      }
      else {
          $validar['precioalquiler']='required';
      }

         $validar['categoria_id']='integer|required|not_in:0';
      if ($v1==1 && $v2==1 && $v3==1) {
          return redirect('/activofijos')->with('mensaje','No hay cambios');
      } else {
      $activofijos->fill($request->all());
      $this->validate($request,$validar,$men);
      $activofijos->save();
      Bitacora::bitacora("Modificación de activo fijo: " .$request->nombre);
      return redirect('/activofijos')->with('mensaje','Hecho');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActivoFijo  $activoFijo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
        $activofijos = ActivoFijo::findOrFail($id);
        Bitacora::bitacora("Activo Fijo eliminado: ".$activofijos->nombre);
        $activofijos->delete();
        return redirect('/activofijos')->with('mensaje','Hecho');
      }catch(\Exception $e){
        return redirect('/activofijos')->with('error','No Puede ser eliminado');
      }
    }

}
