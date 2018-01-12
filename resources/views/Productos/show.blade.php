
@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Producto</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-md-5 col-xs-12">
            <div class="btn-group">
              <a href={!! asset('/productos')!!} class="btn btn-warning btn-md">
                <i class="fa fa-mail-reply"></i>Regresar</a>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6">
              <table class="table">
                <tr>
                  <th>Codigo:</th>
                  <td>{{$productos->codigo}}</td>
                </tr>
                <tr>
                  <th>Nombre:</th>
                  <td>{{$productos->nombre}}</td>
                </tr>

                <tr>
                  <th>Categoria:</th>
                  <td>{{$productos->nombreCategorias($productos->categoria_id)}}</td>
                </tr>
                <tr>
                  <th>Descripción:</th>
                  <td>{{$productos->nombreCategorias2($productos->categoria_id)}}</td>
                </tr>
                <tr>
                  <th>Precio:</th>
                  <td>{{$productos->precio}}</td>
                </tr>
              </table>

          </div>

              <div class="col-sm-6">
                @php
                $url="/imagenes/".$productos['ruta'];
                @endphp
                {!! Html::image($url,'',array('class'=>'','width'=>'300', 'heigth'=>'300'))!!}

            </div>
          </div>
        </div>
      </div>

    </div>

  @endsection
