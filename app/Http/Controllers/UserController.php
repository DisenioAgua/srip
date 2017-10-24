<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\Controller;
use App\User; //para poder usar el modelo
use Redirect;
use Storage;
use App\Http\Requests\EmpleadoRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $nombre = $request->get('nombre');
      $users = User::buscar($nombre);
      return view('Empleados.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
      $file = Input::file('archivo');
      $image = \Image::make(\Input::file('archivo'));
      $path = public_path().'/imagenes/';
      $image->resize(200,200);
      $image->save($path.$file->getClientOriginalName());
      $request['foto']= $file->getClientOriginalName();
      $request['password']=bcrypt($request['password']);
      User::create($request->All());
      Bitacora::bitacora("Registro de nuevo usuario: " .$request->name);
      return redirect('/users')->with('mensaje','Hecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $users = User::find($id);
      return view('Empleados.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = User::find($id);
      return view('Empleados.edit',compact('users'));
    }
    public function perfil($id)
    {
      $users = User::find($id);
      return view('Empleados.perfilUsuario',compact('users'));
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

      $men['nombre.required']='El campo Nombre es obligatorio';
      $men['nombre.size']='El Nombre debe tener 6 caracteres';
      $men['nombre.unique']='Nombre ya ha sido registrado';

      $men['apellido.required']='El campo apellido es obligatorio';
      $men['apellido.size']='El apellido debe tener 6 caracteres';
      $men['apellido.unique']='apellido ya ha sido registrado';

      $men['direccion.required']='El campo dirección es obligatorio';
      $men['direccion.size']='El dirección debe tener 10 caracteres';
      $men['direccion.unique']='dirección ya ha sido registrado';

      $men['telefono.required']='El campo Teléfono es obligatorio';
      $men['telefono.size']='El campo Teléfono debe tener 9 caracteres';
      $men['telefono.unique']='El campo Teléfono ya ha sido registrado';

      $men['dui.required']='El campo NIT es obligatorio';
      $men['dui.size']='El campo NIT debe tener 9 caracteres';
      $men['dui.unique']='El campo NIT ya ha sido registrado';

      $men['name.required']='El campo usuario es obligatorio';
      $men['name.size']='El usuario debe tener 9 caracteres';
      $men['name.unique']='usuario ya ha sido registrado';

      $men['email.required']='El campo email es obligatorio';
      $men['email.size']='El email debe tener 6 caracteres';
      $men['email.unique']='email ya ha sido registrado';

      $men['password.required']='El campo contraseña es obligatorio';
      $men['password.size']='La contraseña debe tener 9 caracteres';
      $men['password.confirmed']='La confirmación de contraseña no coincide';

      $men['acceso.not_in']='Seleccione una opción válida';

      $men['archivo.required']='Debe seleccionar una imagen';
      $men['archivo.file']='El archivo no fue subido correctamente';
      $men['archivo.between']='El peso permitido es de 1 kb a 14000kb';
      $men['archivo.mimes']='Tipo de archivo debe ser png, jpeg o jpg';

      $v1=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9=$v10=0;
     $users = User::find($id);
     if($request['bandera']!=3){
       if ($request['nombre']==$users['nombre']) {
         $v1=1;
       }else{
           $val['nombre']='required | min:4 | max:20 | unique:users';
       }
       if ($request['apellido']==$users['apellido']) {
         $v2=1;
       }else{
           $val['nombre']='required | min:4 | max:20 | unique:users';
       }
       if ($request['direccion']==$users['direccion']) {
         $v3=1;
       }else{
           $val['direccion']='required | min:10 | max:20 | unique:users';
       }
       if ($request['telefono']==$users['telefono']) {
         $v4=1;
       }else{
         $val['telefono']='required | size:9 | unique:users';
       }
       if ($request['dui']==$users['dui']) {
         $v5=1;
       }else{
         $val['dui']= 'required | size:10 | unique:users';
       }
       if ($request['acceso']==$users['acceso']) {
         $v9=1;
       } else {
         $val['acceso']='integer|required|not_in:0';
       }
     }else{
       $v1=$v2=$v4=$v3=$v5=$v9=1;
     }

     if ($request['name']==$users['name']) {
       $v6=1;
     }else{
       $val['name']= 'required | size:9 | unique:users';
     }
     if ($request['email']==$users['email']) {
       $v7=1;
     }else{
       $val['email']= 'required | email | unique:users';
     }
     if ($request['password']=='') {
       $v8=1;
       $request['password']=$users['password'];
     }else{
       $val['password']=  ' size:9 |required_if:bandera,1 |confirmed';
     }

     if($request['archivo']!=null){
       $file = Input::file('archivo');
       $image = \Image::make(\Input::file('archivo'));
       $path = public_path().'/imagenes/';
       $image->resize(200,200);
       $image->save($path.$file->getClientOriginalName());
       $request['foto']= $file->getClientOriginalName();
       Storage::delete($path.$users->foto);
       $val['archivo']='required|file|between:1,14000|mimes:png,jpeg,jpg';
    }else{
      $v10=1;
    }
     if ($v1==1 && $v2==1 && $v3==1 && $v4==1 && $v5==1 && $v6==1 && $v7==1 && $v8==1 && $v9==1 && $v10==1) {
         return redirect('/users')->with('mensaje','No hay cambios');
     } else {
       $this->validate($request,$val,$men);
       if($v8==0){
         $request['password']=bcrypt($request['password']);
       }
       $users->fill($request->all());
       $users->save();
       Bitacora::bitacora("Modificación de usuario: ".$request->name);
       return redirect('/users')->with('mensaje','Hecho');
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
      $users = User::findOrFail($id);
      Bitacora::bitacora("Usuario eliminado: ".$users->name);
      $users->delete();
      return redirect('/users');
    }
}
