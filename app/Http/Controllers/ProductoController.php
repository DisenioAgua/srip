<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\Controller;
use App\Producto; //para poder usar el modelo
use App\Categoria;
use Redirect;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
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
        $productos = Producto::buscar($nombre);
        return view('Productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias= Categoria::orderBy('nombre','asc')->get();
          return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        /*$binario_nombre_temporal=$_FILES['archivo']['tmp_name'];
        $binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));
        $binario_contenido = pg_escape_bytea($binario_contenido);
        $request['archivo_binario']= $binario_contenido;
        $request['archivo_peso']=$_FILES['archivo']['size'];
        $request['archivo_tipo']=$_FILES['archivo']['type'];*/


        $file = Input::file('archivo');
        $hora = date('t').date('m').date('y').date('g').date('i').date('S');
        $image = \Image::make(\Input::file('archivo'));
        $path = public_path().'/imagenes/';
        $image->resize(200,200);
        $image->save($path.$hora.$file->getClientOriginalName());
        $request['ruta']= $hora.$file->getClientOriginalName();
        Producto::create($request->All());
        Bitacora::bitacora("Registro de nuevo producto: " .$request->nombre);
        return redirect('/productos')->with('mensaje','Hecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $productos = Producto::find($id);
        return view('Productos.show',compact('productos'));
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
        $productos = Producto::find($id);
          $categorias= Categoria::orderBy('nombre','asc')->get();
        return view('Productos.edit',compact('productos','categorias'));
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
      $men['codigo.required']='El campo Código es obligatorio';
      $men['codigo.size']='El Código debe tener 6 caracteres';
      $men['codigo.unique']= 'Código ya ha sido registrado';

      $men['nombre.required']='El campo Nombre es obligatorio';
      $men['nombre.min']='El Nombre debe tener mínimo 4  caracteres';
      $men['nombre.max']='El Nombre debe tener máximo 20  caracteres';
      $men['nombre.unique']='El Nombre ya ha sido registrado';

      $men['categoria_id.not_in']='Seleccione una opción válida';
        //
        $v1=0;
        $v2=0;
        $productos = Producto::find($id);
        if ($productos['codigo']==$request['codigo']) {
          $validar['codigo']='required|size:6';
          $v1=1;
        }
        else {
            $validar['codigo']='required|size:6|unique:productos';
        }
        if ($productos['nombre']==$request['nombre']) {
          $validar['nombre']='required|min:4|max:20';
          $v2=1;
        }
        else {
            $validar['nombre']='required|min:4|max:20|unique:productos';
        }
            $validar['categoria_id']='integer|required|not_in:0';
        if ($v1==1 && $v2==1 && $productos['categoria_id']==$request['categoria_id']) {
            return redirect('/productos')->with('mensaje','No hay cambios');
        } else {
          $this->validate($request,$validar,$men);
          $productos->fill($request->all());
          $productos->save();
          Bitacora::bitacora("Modificación de producto: ".$request->nombre);
          return redirect('/productos')->with('mensaje','Hecho');
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
        $productos = Producto::findOrFail($id);
        Bitacora::bitacora("Producto eliminado: ".$productos->nombre);
        $productos->delete();
        return redirect('/productos');
    }
}
