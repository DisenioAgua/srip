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


Route::resource('categorias','CategoriaController');
Route::resource('proveedores','ProveedorController');
Route::resource('compras','CompraController');
Route::resource('productos','ProductoController');
