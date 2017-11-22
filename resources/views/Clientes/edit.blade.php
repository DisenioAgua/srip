@extends('fondo')
@section('layout')
  {!!Form::model($clientes,['class' =>'form-horizontal form-label-left input_mask','autocomplete'=>'off','route' =>['clientes.update',$clientes->id],'method' =>'PUT'])!!}
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cliente <small>Editar</small></h2>
        <div class="clearfix"></div>
      </div>
      @include('Clientes.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
