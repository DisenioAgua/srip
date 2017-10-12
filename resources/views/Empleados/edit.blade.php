@extends('fondo')
@section('layout')
  {!!Form::model($users,['class' =>'form-horizontal form-label-left input_mask','autocomplete'=>'off','route' =>['users.update',$users->id],'method' =>'PUT'])!!}
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Empleado <small>Editar</small></h2>
        <div class="clearfix"></div>
      </div>
      <input type="hidden" name="bandera" value="0">
      @include('Empleados.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
