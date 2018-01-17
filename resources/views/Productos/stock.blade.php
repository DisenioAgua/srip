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

        </div>
        <div class="col-md-3 col-xs-12">
        </div>
        </div>
        <br>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Existencias</th>
            </tr>
          </thead>
          <tbody>
            @php
              $correlativo = 1;
            @endphp
            @foreach($productos as $producto)
              @php
                $aux = App\Servicio::inventario($producto->id);
              @endphp
              @if ($producto->stock > $aux)

            <tr>
              <td>{{$correlativo}}</td>
              <td>{{$producto->nombre}}</td>
              <td>{{$producto->stock}}</td>
              <td style="color:red">{{$aux}}</td>
            </tr>
            @php
              $correlativo++;
            @endphp
              @endif
            @endforeach
          </tbody>
        </table>
        <center>
          {!! str_replace ('/?','?', $productos->appends(Request::only(['nombre']))->render ()) !!}
        </center>
      </div>
    </div>

  </div>

@endsection
