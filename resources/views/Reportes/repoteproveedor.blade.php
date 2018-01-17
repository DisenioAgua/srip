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
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Nit</th>
        </tr>
      </thead>
      <tbody>
        @php
          $correlativo = 1;
        @endphp
        @foreach($proveedores as $proveedor)
        <tr>
          <td>{{$correlativo}}</td>
          <td>{{$proveedor->nombre}}</td>
          <td>{{$proveedor->direccion}}</td>
          <td>{{$proveedor->telefono}}</td>
          <td>{{$proveedor->nit}}</td>

        </tr>
        @php
          $correlativo++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </body>
</html>
