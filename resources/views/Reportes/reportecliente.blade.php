<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="css/styleDOMPdf.css">
  </head>
  {{-- por aqui sepone la imagen como encabezado --}}
  <body>
    <canvas id="myCanvas" width="578" height="200"></canvas>

<script>
   context.beginPath();
   context.moveTo(170, 80);
   context.bezierCurveTo(130, 100, 130, 150, 230, 150);
   context.closePath();
   context.lineWidth = 5;
   context.fillStyle = '#8ED6FF';
   context.fill();
   context.strokeStyle = '#0000ff';
   context.stroke();

   var canvas = document.getElementById("myCanvas");
   var img = canvas.toDataURL("image/png");

   $(document).ready(function() {
      $('<img />', {
         src: img
      });
      img.appendTo($('#testDiv'));
   });
</script>

<div id="testDiv">

</div>
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
