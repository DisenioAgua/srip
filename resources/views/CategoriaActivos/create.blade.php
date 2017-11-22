@extends('fondo')
@section('layout')
  @php
    $bandera=0;
  @endphp
  {!!Form::open(['class' =>'form-horizontal form-label-left input_mask','autocomplete'=>'off','route' =>'categoriaactivos.store','method' =>'POST', 'autocomplete'=>'off'])!!}
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Categoria de Activo Fijo<small>Nuevo</small></h2>
        <div class="clearfix"></div>
      </div>
      @include('CategoriaActivos.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
