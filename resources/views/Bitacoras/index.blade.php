@php
  use App\Bitacora;
  setlocale(LC_ALL,'es');
@endphp
@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Bitacora</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
        <div class="col-md-3 col-xs-12">
        </div>
          <div class="col-md-4 col-xs-12">
            {!!Form::open(['route'=>'bitacoras.index','method'=>'GET','role'=>'search','class'=>'form-inline'])!!}
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <span class="fa fa-search form-control-feedback left" aria-hidden="true"></span>
              {!!Form::text('id_usuario',null,['placeholder'=>'Buscar','class'=>'form-control has-feedback-left'])!!}
            </div>
            {!!Form::close()!!}
          </div>

        </div>
        <br>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Usuario</th>
              <th>Descripción</th>
              <th>Fecha</th>

            </tr>
          </thead>
          <tbody>
            @php
              $correlativo = 1;
            @endphp
            @foreach($bitacoras as $bitacora)
            <tr>
              <td>{{$correlativo}}</td>
              <td>{{$bitacora->name}}</td>
              <td>{{$bitacora->detalle}}</td>
              {{-- <td>{{$bitacora->created_at->formatLocalized('%d de %B de %Y a las %H:%M:%S')}}</td> --}}
              {{-- <td>{{$bitacora->created_at->format('d-m-Y')}}</td> --}}
              
            </tr>
            @php
              $correlativo++;
            @endphp
            @endforeach
          </tbody>
        </table>
        <center>
          {!! str_replace ('/?','?', $bitacoras->appends(Request::only(['id_usuario']))->render ()) !!}
        </center>
      </div>
    </div>

  </div>

@endsection
