@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Pendientes de Pago</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
        <div class="col-md-5 col-xs-12">

        </div>
        <div class="col-md-3 col-xs-12">
        </div>
          <div class="col-md-4 col-xs-12">
            {!!Form::open(['route'=>'ventas.index','method'=>'GET','role'=>'search','class'=>'form-inline'])!!}
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <span class="fa fa-search form-control-feedback left" aria-hidden="true"></span>
              {!!Form::text('buscar',null,['placeholder'=>'Buscar','class'=>'form-control has-feedback-left'])!!}
            </div>
            {!!Form::close()!!}
          </div>

        </div>
        <br>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Factura</th>
              <th colspan="1">Opción</th>
            </tr>
          </thead>
          <tbody>
            @php
              $correlativo = 1;
            @endphp
            @foreach($pagos as $pago)
            <tr>
              <td>{{$correlativo}}</td>
              <td>{{$pago->num_factura}}</td>
              <td>
                @include('Pagos.Formularios.delete')
              </td>
            </tr>
            @php
              $correlativo++;
            @endphp
            @endforeach
          </tbody>
        </table>
        <center>
          {!! str_replace ('/?','?', $pagos->appends(Request::only(['factura']))->render ()) !!}
        </center>
      </div>
    </div>

  </div>

@endsection
