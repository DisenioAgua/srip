<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use DB;
use Session;
use Redirect;
use Crypt;
use App\User;
use App\Bitacora;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::attempt(['name'=>$request['name'],'password'=>$request['password']])) {
          Bitacora::bitacora("Ingreso al sistema");
          return view('fondo');
        } else {
          $error='Usuario o contraseña incorrecta';
          return view('login',compact('error'));
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
        //
    }
    public function logout(){
      Auth::logout();
      return Redirect('/');
    }
    public function correo(Request $request){
      $count=0;
      $usuario= User::where('email','=',$request['email'])->get();
      foreach ($usuario as $us) {
       $u=$us->name;
       $c=$us->password;
       $count=$count+1;
      }
      if($count==1){
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cad = "";
        for($i=0;$i<12;$i++){
          $cad .= substr($str,rand(0,62),1);
        }
        $mensaje='Su usuario es: '.$u. 'Su contraseña es :'.$cad;
        try{
          Mail::raw($mensaje,function($msj) use ($request){
            $msj->subject('Nueva contraseña en Srip');
            try{
              $msj->to($request['email']);
            } catch (\Swift_RfcComplianceException $e){
              DB::rollback();
              return redirect('/')->with('error','Lo sentimos el correo no pudo ser enviado');
            }
          });
        }catch (\Swift_TransportException $e){
          DB::rollback();
          return redirect('/')->with('error','Revise el acceso a internet');
        }
        DB::commit();
        return redirect('/')->with('mensaje','Usuario y nueva contraseña enviados');
      }else{
        return redirect('/')->with('error','Ningún usuario registrado con ese correo');
      }
    }
}
