@extends('fondo')
@section('layout')
  {!!Form::model($categorias,['class' =>'form-horizontal form-label-left input_mask','autocomplete'=>'off','route' =>['categorias.update',$categorias->id],'method' =>'PUT'])!!}
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Categoria <small>Editar</small></h2>
        <div class="clearfix"></div>
      </div>
      @include('Categorias.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
