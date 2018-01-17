<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de Compras</title>
    <link rel="stylesheet" href="css/styleDOMPdf.css">
  </head>
  {{-- por aqui sepone la imagen como encabezado --}}
  <body>
    <h1>Listado de Compras</h1>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Fecha</th>
          <th>Factura</th>
          <th>Proveedor</th>
        </tr>
      </thead>
      <tbody>
        @php
          $correlativo = 1;
        @endphp
        @foreach($compras as $compra)
        <tr>
          <td>{{$correlativo}}</td>
          <td>{{$compra->fecha_compra->format('d-m-Y')}}</td>
          <td>{{$compra->num_factura}}</td>
          <td>{{$compra->nombreProveedor($compra->proveedor_id)}}</td>
        
        </tr>
        @php
          $correlativo++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </body>
</html>
