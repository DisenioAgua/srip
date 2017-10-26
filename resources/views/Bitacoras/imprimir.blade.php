@php
  use App\Bitacora;
  setlocale(LC_ALL,'es');
@endphp
@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title" id="ocultar2">
        <h2>Bitacora</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row" id="ocultar">
          <div class="col-md-5 col-xs-12">
            <div class="btn-group">
              <a onclick="
              var o = document.querySelector('#ocultar');
              var o2 = document.querySelector('#ocultar2');
              o.setAttribute('style','display:none');
              window.print();
              o.setAttribute('style','display:inline');
              o2.setAttribute('style','display:inline');
              " class="btn btn-primary btn-md" style="display:inline">
                <i class="fa fa-print"></i>Imprimir</a>
              </div>
          </div>
          <div class="col-md-3 col-xs-12">
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
        </table>
        <table class="table table-striped">
          <tbody>
            @php
              $correlativo = 1;
            @endphp
            @foreach($bitacoras as $bitacora)
            <tr>
              <td>{{$correlativo}}</td>
              <td>{{$bitacora->name}}</td>
              <td>{{$bitacora->detalle}}</td>
              <td>@php
                $fecha=$bitacora->created_at;
                $aux1 = explode(' ', $fecha);
                $aux = explode('-',$aux1[0]);
                $fecha=$aux[2].'/'.$aux[1].'/'.$aux[0].' '.$aux1[1];
              @endphp
              {{$fecha}}</td>
              {{-- <td>{{$bitacora->created_at->formatLocalized('%d de %B de %Y a las %H:%M:%S')}}</td> --}}
              {{-- <td>{{$bitacora->created_at->format('d-m-Y')}}</td> --}}

            </tr>
            @php
              $correlativo++;
            @endphp
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>

@endsection
