<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Bitacora;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $nombre = $request->get('nombre');
      $clientes = Cliente::buscar($nombre);
      return view('Clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
      Cliente::create($request->All());
      Bitacora::bitacora("Registro de nuevo cliente: " .$request->nombre);
      return redirect('/clientes')->with('mensaje','Hecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $clientes = Cliente::find($id);
      return view('Clientes.show',compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $clientes = Cliente::find($id);
      return view('Clientes.edit',compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $men['nombre.required']='El campo Nombre es obligatorio';
      $men['nombre.min']='El Nombre debe tener minimo 4 caracteres';
      $men['nombre.max']='El Nombre debe tener maximo 20 caracteres';
      $men['nombre.unique']='Nombre ya ha sido registrado';

      $men['apellido.required']='El campo Apellido es obligatorio';
      $men['apellido.min']='El Apellido debe tener minimo 4 caracteres';
      $men['apellido.max']='El Apellido debe tener maximo 20 caracteres';
      $men['apellido.unique']='Apellido ya ha sido registrado';

      $men['direccion.required']='El campo dirección es obligatorio';
      $men['direccion.min']='La dirección debe tener minimo 10 caracteres';
      $men['direccion.max']='La dirección debe tener maximo 20 caracteres';
      $men['direccion.unique']='dirección ya ha sido registrado';

      $men['telefono.required']='El campo Teléfono es obligatorio';
      $men['telefono.size']='El campo Teléfono debe tener 9 caracteres';
      $men['telefono.unique']='El campo Teléfono ya ha sido registrado';

      $men['dui.size']='El campo DUI debe tener 10 caracteres';
      $men['dui.unique']='El campo DUI ya ha sido registrado';

       $v1=$v2=$v3=$v4=$v5=0;
      $clientes = Cliente::find($id);
      if ($request['nombre']==$clientes['nombre']) {
        $v1=1;
      }else{
          $val['nombre']='required | min:4 | max:20 | unique:clientes';
      }
      if ($request['apellido']==$clientes['apellido']) {
        $v2=1;
      }else{
          $val['apellido']='required | min:4 | max:20 | unique:clientes';
      }
      if ($request['direccion']==$clientes['direccion']) {
        $v3=1;
      }else{
          $val['direccion']='required | min:10 | max:20 | unique:clientes';
      }
      if ($request['telefono']==$clientes['telefono']) {
        $v4=1;
      }else{
        $val['telefono']='required | size:9 | unique:clientes';
      }
      if ($request['dui']==$clientes['dui']) {
        $v5=1;
      }else{
        $val['dui']= 'required | size:17 | unique:clientes';
      }
      if ($v1==1 && $v2==1 && $v3==1 && $v4==1 && $v5==1) {
          return redirect('/clientes')->with('mensaje','No hay cambios');
      } else {
        $this->validate($request,$val,$men);
        $clientes->fill($request->all());
        $clientes->save();
        Bitacora::bitacora("Modificación de cliente: ".$request->nombre);
        return redirect('/clientes')->with('mensaje','Hecho');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $clientes = Cliente::findOrFail($id);
      Bitacora::bitacora("Cliente eliminado: ".$clientes->nombre);
      $clientes->delete();
      return redirect('/clientes');
    }
}
