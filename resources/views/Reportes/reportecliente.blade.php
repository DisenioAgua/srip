<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="css/styleDOMPdf.css">
  </head>
  {{-- por aqui sepone la imagen como encabezado --}}
  <body>
    <h1>Listado de Clientes</h1>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Dirección</th>
          <th>Teléfono</th>
        </tr>
      </thead>
      <tbody>
        @php
          $correlativo = 1;
        @endphp
        @foreach($clientes as $cliente)
        <tr>
          <td>{{$correlativo}}</td>
          <td>{{$cliente->nombre}}</td>
          <td>{{$cliente->apellido}}</td>
          <td>{{$cliente->direccion}}</td>
          <td>{{$cliente->telefono}}</td>
        </tr>
        @php
          $correlativo++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </body>
</html>
