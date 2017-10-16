<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Categoria; //para poder usar el modelo
use Redirect;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $nombre = $request->get('nombre');
        $categorias = Categoria::buscar($nombre);
        return view('Categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        //
        Categoria::create($request->All());
        Bitacora::bitacora("Registro de nueva categoria: " .$request->nombre);
        return redirect('/categorias')->with('mensaje','Hecho');
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
        $categorias = Categoria::find($id);
        return view('Categorias.edit',compact('categorias'));
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
        $men['nombre.required']='El campo Nombre es obligatorio';
        $men['nombre.min']='El Nombre debe tener mínimo 4  caracteres';
        $men['nombre.max']='El Nombre debe tener máximo 20  caracteres';
        $men['nombre.unique']='El Nombre ya ha sido registrado';

        $men['descripcion.required']='El campo Descripcion es obligatorio';
        $men['descripcion.min']='El Descripcion debe tener mínimo 10  caracteres';
        $men['descripcion.max']='El Descripcion debe tener máximo 20  caracteres';
        $men['descripcion.unique']='El Descripcion ya ha sido registrado';

        $v1=0;
        $v2=0;

        $categorias = Categoria::find($id);
        if ($categorias['nombre']==$request['nombre']) {
          $validar['nombre']='required | min:4 | max:20';
          $v1=1;
        }
        else {
            $validar['nombre']='required | min:4 | max:20 | unique:categorias';
        }
        if ($categorias['descripcion']==$request['descripcion']) {
          $validar['descripcion']='required | min:10 | max:20';
          $v2=1;
        }
        else {
            $validar['descripcion']='required | min:10 | max:20 | unique:categorias';
        }
        if ($v1==1 && $v2==1) {
            return redirect('/categorias')->with('mensaje','No hay cambios');
        } else {
        $categorias->fill($request->all());
        $this->validate($request,$validar,$men);
        $categorias->save();
        Bitacora::bitacora("Modificación de categoria: " .$request->nombre);
        return redirect('/categorias')->with('mensaje','Hecho');
      }
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
        $categorias = Categoria::findOrFail($id);
        Bitacora::bitacora("Categoria eliminada: " .$categorias->nombre);
        $categorias->delete();
        return redirect('/categorias');
    }
}
