@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Servicio</h2> 
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-md-5 col-xs-12">
            <div class="btn-group">
              <a href={!! asset('/servicios/create')!!} class="btn btn-success btn-md">
                <i class="fa fa-plus"></i>Nuevo</a>
              </div>
          </div>
        <div class="col-md-3 col-xs-12">
        </div>
          <div class="col-md-4 col-xs-12">
            {!!Form::open(['route'=>'servicios.index','method'=>'GET','role'=>'search','class'=>'form-inline'])!!}
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <span class="fa fa-search form-control-feedback left" aria-hidden="true"></span>
              {!!Form::text('nombre',null,['placeholder'=>'Buscar','class'=>'form-control has-feedback-left'])!!}
            </div>
            {!!Form::close()!!}
          </div>

        </div>
        <br>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Ganancia</th>
              <th colspan="2">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @php
              $correlativo = 1;
            @endphp
            @foreach($servicios as $servicio)
            <tr>
              <td>{{$correlativo}}</td>
              <td>{{$servicio->nombre}}</td>
              <td>{{$servicio->ganancia}}</td>
              <td>
                @include('Servicios.Formulario.delete')
  				    </td>

            </tr>
            @php
              $correlativo++;
            @endphp
            @endforeach
          </tbody>
        </table>
        <center>
          {!! str_replace ('/?','?', $servicios->appends(Request::only(['nombre']))->render ()) !!}
        </center>
      </div>
    </div>

  </div>

@endsection
