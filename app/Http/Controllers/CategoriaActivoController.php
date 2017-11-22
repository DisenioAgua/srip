<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\CategoriaActivo; //para poder usar el modelo
use Redirect;
use App\Http\Requests\CategoriaActivoRequest;

class CategoriaActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $nombre = $request->get('nombre');
      $categoriaactivos = CategoriaActivo::buscar($nombre);
      return view('CategoriaActivos.index',compact('categoriaactivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('categoriaactivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaActivoRequest $request)
    {
      CategoriaActivo::create($request->All());
      Bitacora::bitacora("Registro de nueva categoria de activo: " .$request->nombre);
      return redirect('/categoriaactivos')->with('mensaje','Hecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriaActivo  $categoriaActivo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriaActivo  $categoriaActivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categoriaactivos = CategoriaActivo::find($id);
      return view('CategoriaActivos.edit',compact('categoriaactivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriaActivo  $categoriaActivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $men['codigo.required']='El campo Nombre es obligatorio';
      $men['codigo.min']='El Nombre debe tener mínimo 4  caracteres';
      $men['codigo.max']='El Nombre debe tener máximo 20  caracteres';
      $men['codigo.unique']='El Nombre ya ha sido registrado';

      $men['nombre.required']='El campo Nombre es obligatorio';
      $men['nombre.min']='El Nombre debe tener mínimo 4  caracteres';
      $men['nombre.max']='El Nombre debe tener máximo 20  caracteres';
      $men['nombre.unique']='El Nombre ya ha sido registrado';

      $v1=0;
      $v2=0;

      $categoriaactivos = CategoriaActivo::find($id);
      if ($categoriaactivos['codigo']==$request['codigo']) {
        $validar['codigo']='required | min:4 | max:10';
        $v1=1;
      }
      else {
          $validar['codigo']='required | min:4 | max:10 | unique:categoria_activos';
      }
      if ($categoriaactivos['nombre']==$request['nombre']) {
        $validar['nombre']='required | min:4 | max:10';
        $v2=1;
      }
      else {
          $validar['nombre']='required | min:4 | max:10 | unique:categoria_activos';
      }
      if ($v1==1 && $v2==1) {
          return redirect('/categoriaactivos')->with('mensaje','No hay cambios');
      } else {
      $categoriaactivos->fill($request->all());
      $this->validate($request,$validar,$men);
      $categoriaactivos->save();
      Bitacora::bitacora("Modificación de categoria e activos: " .$request->nombre);
      return redirect('/categoriaactivos')->with('mensaje','Hecho');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriaActivo  $categoriaActivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $categoriaactivos = CategoriaActivo::findOrFail($id);
      Bitacora::bitacora("Categoria de activo eliminada: " .$categoriaactivos->nombre);
      $categoriaactivos->delete();
      return redirect('/categoriaactivos');
    }
}
