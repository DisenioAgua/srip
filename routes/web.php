<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
  $users=DB::select('select * from users');
  $cuenta= count($users);
  if ($cuenta==0) {
      return view('primerUsuario');
  } else {
      return view('login');
  }


});

Route::get('/inicio', function () {
    return view('fondo');
});

Route::get('pass', function () {
    return view('recuperacion');
});

Route::resource('categorias','CategoriaController');
Route::resource('proveedores','ProveedorController');
Route::resource('compras','CompraController');
Route::resource('productos','ProductoController');
Route::resource('users','UserController');

Route::resource('login','LoginController');
Route::get('logout','LoginController@logout');//salir
Route::post('/pass/correo','LoginController@correo');

Route::match(['get','post'],'destroyProveedor/{id}','ProveedorController@destroy');
Route::match(['get','post'],'destroyCategoria/{id}','CategoriaController@destroy');
Route::match(['get','post'],'destroyProducto/{id}','ProductoController@destroy');
Route::match(['get','post'],'destroyCompra/{id}','CompraController@destroy');
Route::match(['get','post'],'destroyUser/{id}','UserController@destroy');

Route::match(['get','post'],'/nombredelproducto/{id}','CompraController@nombreProducto');
