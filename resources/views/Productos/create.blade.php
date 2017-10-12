@extends('fondo')
@section('layout')
@php
  $bandera= 1;
@endphp 
  {!!Form::open(['class' =>'form-horizontal form-label-left input_mask','route' =>'productos.store','method' =>'POST','enctype'=>'multipart/form-data','files'=>true,'autocomplete'=>'off','role'=>'form'])!!}
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Producto <small>Nuevo</small></h2>
        <div class="clearfix"></div>
      </div>
      @include('Productos.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
