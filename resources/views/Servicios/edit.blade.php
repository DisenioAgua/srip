@extends('fondo')
@section('layout')
  @php
    $bandera= 0;
  @endphp
  {!!Form::model($servicios,['class' =>'form-horizontal form-label-left input_mask','autocomplete'=>'off','route' =>['servicios.update',$servicios->id],'method' =>'PUT'])!!}
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Servicio <small>Editar</small></h2>
        <div class="clearfix"></div>
      </div>
      @include('Servicios.Formulario.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
