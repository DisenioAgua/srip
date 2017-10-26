@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Empleado</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-md-5 col-xs-12">
            <div class="btn-group">
              <a href={!! asset('/users')!!} class="btn btn-warning btn-md">
                <i class="fa fa-mail-reply"></i>Regresar</a>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6">
              <table class="table">
                <tr>
                  <th>Nombre:</th>
                  <td>{{$users->nombre}}</td>
                </tr>
                <tr>
                  <th>Apellido:</th>
                  <td>{{$users->apellido}}</td>
                </tr>
                <tr>
                  <th>Dirección:</th>
                  <td>{{$users->direccion}}</td>
                </tr>
                <tr>
                  <th>Teléfono:</th>
                  <td>{{$users->telefono}}</td>
                </tr>
                <tr>
                  <th>Dui:</th>
                  <td>{{$users->dui}}</td>
                </tr>
                <tr>
                  <th>Sexo:</th>
                  <td>{{($users->sexo)?"Masculino":"Femenino"}}</td>
                </tr>
                <tr>
                  <th>Tipo de usuario:</th>
                  @if ($users->acceso == 1)
                    <td>Administrador</td>
                  @else
                    <td>Encargado</td>
                  @endif
                </tr>
                <tr>
                  <th>Usuario:</th>
                  <td>{{$users->name}}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{$users->email}}</td>
                </tr>
              </table>

          </div>

              <div class="col-sm-6">
                @php
                $url="/imagenes/".$users['foto'];
                @endphp
                {!! Html::image($url,'',array('class'=>'','width'=>'300', 'heigth'=>'300'))!!}

            </div>
          </div>
        </div>
      </div>

    </div>

  @endsection
