@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Activo Fijo</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-md-5 col-xs-12">
            <div class="btn-group">
              <a href={!! asset('/activofijos')!!} class="btn btn-warning btn-md">
                <i class="fa fa-mail-reply"></i>Regresar</a>
              </div>
            </div>
          </div>
          <br>
          <table class="table">
            <tr>
              <th>#</th>
              <th>Fecha</th>
              <th>Depreciación por Mes</th>
              <th>Depreciación Acumulada</th>
              <th>Valor del bien</th>
            </tr>
            @php
            $vfecha=$activo->fecha_compra;
            $hoy = Carbon\Carbon::now();
            $meses_hasta_hoy = $vfecha->diffInMonths($hoy);
            $valor_a_depreciar = ($activo->precio/2)/12;
            $acumulador = 0;
            $precio = $activo->precio;
            $valor = $precio;
            @endphp
            @for ($i=0; $i <= $meses_hasta_hoy; $i++)
              @php
                if($valor<=0){
                  break;
                }
              @endphp
              <tr>
                <td>{{$i+1}}</td>
                <td>{{$vfecha->addMonths($i)->format('d-m-Y')}}</td>
                <td>{{'$ '.number_format($valor_a_depreciar,2,'.',',')}}</td>
                <td>{{'$ '.number_format($acumulador,2,'.',',')}}</td>
                @php
                  $valor = $precio-$acumulador;
                @endphp
                <td>{{'$ '.number_format($valor,2,'.',',')}}</td>
                @php
                $acumulador += $valor_a_depreciar;
                @endphp
              </tr>
            @endfor
          </table>

        </div>
      </div>

    </div>

  @endsection
