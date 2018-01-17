<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Servicio;
use App\DetalleServicio;
use App\ActivoFijo;
use App\Producto;
use App\Ventas;
use Validator;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $factura = $request->get('factura');
      $ventas = Ventas::buscar($factura);
      return view('Ventas.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clientes= Cliente::orderBy('nombre','asc')->get();
      $servicios= Servicio::orderBy('nombre','asc')->get();
      $detalles= DetalleServicio::orderBy('id','asc')->get();

      $activo= ActivoFijo::orderBy('id','asc')->get();

        return view('ventas.create',compact('clientes','servicios','detalles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validar= Validator::make($request->all(),[
        'num_factura'=>'required| min:5 | max:7 | unique:ventas',

      ],[
        'num_factura.required'=>'El número de factura es obligatorio',
        'num_factura.min'=>'El número de factura debe contener mínimo 5 caracteres',
        'num_factura.max'=>'El número de factura debe contener máximo 7 caracteres',
        'num_factura.unique'=>'El número de factura ya esta registrado',

      ]
    );
    if ($validar->fails()) {
      return redirect()->back()->withErrors($validar->errors());
    } else {


      $cientes= Cliente::orderBy('nombre','asc')->get();
      //return redirect()->back()->withErrors($validar->errors());
      //return view('compras.create',compact('proveedores'))->withErrors($validar->errors());

        $ventas= new Ventas;
        $ventas->fecha_venta=$request->fecha_venta;
        $ventas->num_factura=$request->num_factura;
        $ventas->cliente_id=$request->cliente_id;
        $ventas->servicio_id=$request->button;
        $precio= Ventas::precio($request->button);
        $ventas->precio=$precio;
        $ventas->save();

        return redirect('/ventas');

      // Bitacora::bitacora("Registro de nueva compra n° de factura: " .$request->num_factura);
    }
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
     return redirect('/ventas');
    }
    public function cambioestado($id){
     $venta = Ventas::find($id);
     $venta->estado=false;
     $venta->save();
     return redirect('/ventas');
    }
}
