{{-- @if(Auth::user()->acceso==1) --}}
@php
  $bandera = 1;
@endphp
@extends('fondo')
@section('layout')
  {!!Form::open(['class' =>'form-horizontal form-label-left input_mask','enctype'=>'multipart/form-data','files'=>true,'autocomplete'=>'off','role'=>'form','route' =>'users.store','method' =>'POST'])!!}
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Empleado <small>Nuevo</small></h2>
        <div class="clearfix"></div>
      </div>
      <input type="hidden" name="bandera" value="1">
      @include('Empleados.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
{{-- @else
  <!DOCTYPE HTML>
  <!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="refresh" content="0; URL=/fjj/public/inicio">
    </head>
    <body>
    </body>
  </html>
@endif --}}
