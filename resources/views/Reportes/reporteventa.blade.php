<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de Ventas</title>
    <link rel="stylesheet" href="css/styleDOMPdf.css">
  </head>
  {{-- por aqui sepone la imagen como encabezado --}}
  <body>
    <h1>Listado de Ventas</h1>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Fecha</th>
          <th>Factura</th>
        </tr>
      </thead>
      <tbody>
        @php
          $correlativo = 1;
        @endphp
        @foreach($ventas as $venta)
        <tr>
          <td>{{$correlativo}}</td>
          <td>{{$venta->fecha_venta->format('d-m-Y')}}</td>
          <td>{{$venta->num_factura}}</td>
        
        </tr>
        @php
          $correlativo++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </body>
</html>
