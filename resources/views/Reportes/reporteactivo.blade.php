<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado del Activo Fijo</title>
    <link rel="stylesheet" href="css/styleDOMPdf.css">
  </head>
  {{-- por aqui sepone la imagen como encabezado --}}
  <body>
    <h1>Listado del Activo Fijo</h1>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Codigo</th>
          <th>Fecha de compra</th>
        </tr>
      </thead>
      <tbody>
        @php
          $correlativo = 1;
        @endphp
        @foreach($activofijos as $activofijo)
        <tr>
          <td>{{$correlativo}}</td>
          <td>{{$activofijo->nombre}}</td>
          <td>{{$activofijo->CodigoCategoria($activofijo->categoria_id).'-'.$activofijo->codigo}}</td>
          <td>{{$activofijo->fecha_compra->format('d-m-Y')}}</td>
        
        </tr>
        @php
          $correlativo++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </body>
</html>
