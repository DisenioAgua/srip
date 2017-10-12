@extends('fondo')
@section('layout')
@php
  $bandera= 1;
@endphp
  {!!Form::open(['class' =>'form-horizontal form-label-left input_mask','route' =>'compras.store','method' =>'POST'])!!}
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Compra </h2>
        <div class="clearfix"></div>
      </div>
      @include('Compras.Formularios.form')
    </div>
  </div>
  {!!Form::close()!!}
@endsection
