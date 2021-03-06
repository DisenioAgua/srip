@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Categoría de Activo Fijo</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
        <div class="col-md-5 col-xs-12">
          <div class="btn-group">
            <a href={!! asset('/categoriaactivos/create')!!} class="btn btn-success btn-md">
              <i class="fa fa-plus"></i>Nuevo</a>
            </div>
            <div class="btn-group">
              <a href={!! asset('/activofijos/create')!!} class="btn btn-warning btn-md">
                <i class="fa fa-reply"></i>Regresar</a>
              </div>
        </div>
        <div class="col-md-3 col-xs-12">
        </div>
          <div class="col-md-4 col-xs-12">
            {!!Form::open(['route'=>'categoriaactivos.index','method'=>'GET','role'=>'search','class'=>'form-inline'])!!}
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
              <th>Código</th>
              <th>Nombre</th>
              <th>Tipo de Depreciación</th>
              <th colspan="2">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @php
              $correlativo = 1;
            @endphp
            @foreach($categoriaactivos as $categoriaactivo)
            <tr>
              <td>{{$correlativo}}</td>
              <td>{{$categoriaactivo->codigo}}</td>
              <td>{{$categoriaactivo->nombre}}</td>
              <td>
                @if ($categoriaactivo->tipodepreciacion==0)
                  Edificaciones
                @endif
                @if ($categoriaactivo->tipodepreciacion==1)
                    Maquinaria
                @endif
                @if ($categoriaactivo->tipodepreciacion==2)
                    Vehiculos
                @endif
                @if ($categoriaactivo->tipodepreciacion==3)
                  Otros Bienes Muebles
                @endif
                </td>
              <td>
                @include('CategoriaActivos.Formularios.delete')
  				    </td>

            </tr>
            @php
              $correlativo++;
            @endphp
            @endforeach
          </tbody>
        </table>
        <center>
          {!! str_replace ('/?','?', $categoriaactivos->appends(Request::only(['nombre']))->render ()) !!}
        </center>
      </div>
    </div>

  </div>

@endsection
