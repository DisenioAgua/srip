<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
//para poder usar las funciones del controlador
use App\Http\Controllers\Controller;
use App\Proveedor; //para poder usar el modelo
use Redirect;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
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
        $proveedores = Proveedor::buscar($nombre);
        return view('Proveedores.index',compact('proveedores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        //
        Proveedor::create($request->All());
        Bitacora::bitacora("Registro de nuevo proveedor: " .$request->nombre);
        return redirect('/proveedores')->with('mensaje','Hecho');
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
        $proveedores = Proveedor::find($id);
        return view('Proveedores.edit',compact('proveedores'));
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
        $men['nombre.min']='El Nombre debe tener minimo 4 caracteres';
        $men['nombre.max']='El Nombre debe tener maximo 20 caracteres';
        $men['nombre.unique']='Nombre ya ha sido registrado';

        $men['direccion.required']='El campo dirección es obligatorio';
        $men['direccion.min']='La dirección debe tener minimo 10 caracteres';
        $men['direccion.max']='La dirección debe tener maximo 20 caracteres';
        $men['direccion.unique']='dirección ya ha sido registrado';

        $men['telefono.required']='El campo Teléfono es obligatorio';
        $men['telefono.size']='El campo Teléfono debe tener 9 caracteres';
        $men['telefono.unique']='El campo Teléfono ya ha sido registrado';

        $men['nit.required']='El campo NIT es obligatorio';
        $men['nit.size']='El campo NIT debe tener 17 caracteres';
        $men['nit.unique']='El campo NIT ya ha sido registrado';

         $v1=$v2=$v3=$v4=0;
        $proveedores = Proveedor::find($id);
        if ($request['nombre']==$proveedores['nombre']) {
          $v1=1;
        }else{
            $val['nombre']='required | min:4 | max:20 | unique:proveedors';
        }
        if ($request['direccion']==$proveedores['direccion']) {
          $v2=1;
        }else{
            $val['direccion']='required | min:10 | max:20 | unique:proveedors';
        }
        if ($request['telefono']==$proveedores['telefono']) {
          $v3=1;
        }else{
          $val['telefono']='required | size:9 | unique:proveedors';
        }
        if ($request['nit']==$proveedores['nit']) {
          $v4=1;
        }else{
          $val['nit']= 'required | size:17 | unique:proveedors';
        }
        if ($v1==1 && $v2==1 && $v3==1 && $v4==1) {
            return redirect('/proveedores')->with('mensaje','No hay cambios');
        } else {
          $this->validate($request,$val,$men);
          $proveedores->fill($request->all());
          $proveedores->save();
          Bitacora::bitacora("Modificación de proveedor: ".$request->nombre);
          return redirect('/proveedores')->with('mensaje','Hecho');
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
        $proveedores = Proveedor::findOrFail($id);
        Bitacora::bitacora("Proveedor eliminado: ".$proveedores->nombre);
        $proveedores->delete();
        return redirect('/proveedores');
    }
}
