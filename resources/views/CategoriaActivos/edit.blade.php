@extends('fondo')
@section('layout')
  @php
    $bandera=1;
  @endphp
  {!!Form::model($categoriaactivos,['class' =>'form-horizontal form-label-left input_mask','autocomplete'=>'off','route' =>['categoriaactivos.update',$categoriaactivos->id],'method' =>'PUT'])!!}
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Categoria de Activo Fijo <small>Editar</small></h2>
        <div class="clearfix"></div>
      </div>
      @include('CategoriaActivos.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
