@extends('fondo')
@section('layout')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Compra</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-md-5 col-xs-12">
            <div class="btn-group">
              <a href={!! asset('/compras')!!} class="btn btn-success btn-md">
                <i class="fa fa-mail-reply"></i>Regresar</a>
              </div>
            </div>
          </div>
          <br>
          <table class="table">
            <tr>
              <th>fecha</th>
              <td>{{$compra->fecha_compra->format('d-m-Y')}}</td>
            </tr>
            <tr>
              <th>facura</th>
              <td>{{$compra->num_factura}}</td>
            </tr>
            <tr>
              <th>Proveedor</th>
              <td>{{$compra->nombreProveedor($compra->proveedor_id)}}</td>
            </tr>
          </table>
          <div class="x_title">
            <h2>Detalle</h2>
            <div class="clearfix"></div>
          </div>
          <table class="table">
            <tr>
              <th>producto</th>
              <th>cantidad</th>
              <th>precio</th>
              <th>total</th>
            </tr>
            @foreach ($detalleCompras as $dc)
              <tr>
                <td>{{$dc->nombreProducto($dc->producto_id)}}</td>
                <td>{{$dc->cantidad}}</td>
                <td>{{$dc->precio}}</td>
                <td>{{$dc->precio*$dc->cantidad}}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>

    </div>

  @endsection
