@extends('fondo')
@section('layout')
  @php
    $bandera= 0;
  @endphp
  {!!Form::model($productos,['class' =>'form-horizontal form-label-left input_mask','route' =>['productos.update',$productos->id],'method' =>'PUT'])!!}
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Producto <small>Editar</small></h2>
        <div class="clearfix"></div>
      </div>
      @include('Productos.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
