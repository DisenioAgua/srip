$(document).ready(function(){
  $("#buscar").on("keyup",function(e){
    var tabla=$("#tabla");
    var texto=$("#buscar").val();
    var ruta="/srip/public/buscarProducto/"+texto;
    var ruta2="/srip/public/buscarActivo/"+texto;
    tabla.empty();
    head=
    "<thead>"+
    "<tr>"+
    "<th>Nombre</th>"+
    "<th>Opciones</th>"+
    "</tr>"+
    "</thead>";
    tabla.append(head);
    if(texto.length>0){
    $.get(ruta,function(res){
      $(res).each(function(key,value){
        html =
        "<tr>"+
        "<td>"+
        value.nombre+
        "</td>"+
        "<td>"+
        "<input type='hidden' name='tipo[]' value='producto'>"+
        "<input type='hidden' name='nombre_producto[]' value='"+value.nombre+"'>"+
        "<input type='hidden' name='id_producto[]' value='"+value.id+"'>"+
        "<input type='hidden' name='id_activo[]' value=''>"+
        "<button type='button' class='btn btn-xs btn-primary' id='agregar_producto'>"+
        "<i class='fa fa-arrow-right'></i>"+
        "</button>"+
        "</td>"+
        "</tr>";
        tabla.append(html);
      });
    });
    $.get(ruta2,function(res){
      $(res).each(function(key,value){
        html =
        "<tr>"+
        "<td>"+
        value.nombre+
        "</td>"+
        "<td>"+
        "<input type='hidden' name='tipo[]' value='activo'>"+
        "<input type='hidden' name='nombre_activo[]' value='"+value.nombre+"'>"+
        "<input type='hidden' name='id_activo[]' value='"+value.id+"'>"+
        "<input type='hidden' name='id_producto[]' value=''>"+
        "<button type='button' class='btn btn-xs btn-primary' id='agregar_producto'>"+
        "<i class='fa fa-arrow-right'></i>"+
        "</button>"+
        "</td>"+
        "</tr>";
        tabla.append(html);
      });
    });
  }
});
  $("#tabla").on('click','#agregar_producto',function(e){
    e.preventDefault();
    var nombre =
    $(this).parents('tr').find('input:eq(1)').val();
    var id_activo =
    $(this).parents('tr').find('input:eq(2)').val();
    var id_producto =
    $(this).parents('tr').find('input:eq(3)').val();
    var tabla = $("#tabla2");
    var tabla_busqueda = $("#tabla");
    var cantidad = $("#cantidad").val();
    var html =
    "<tr>"+
    "<td>"+
    nombre+
    "</td>"+
    "<td>"+
    cantidad+
    "</td>"+
    "<td>"+
    "<input type='hidden' name='servicios[]' value ='"+id+"'>"+
    "<input type='hidden' name='cantidades_servicios[]' value ='"+cantidad+"'>"+
    "<button type='button' class='btn btn-xs btn-danger' id='eliminar_servicios'>"+
    "<i class='fa fa-remove'></i>"+
    "</button>"+
    "</td>"+
    "</tr>";
    tabla.append(html);
    tabla_busqueda.empty();
    head =
    "<thead>"+
    "<tr>"+
    "<th>Nombre</th>"+
    "<th>Opciones</th>"+
    "</tr>"+
    "</thead>";
    tabla_busqueda.append(head);
    $("#cantidad_servicios").val("1");
    $("#buscar").val("");
    $("#buscar").focus();
  });
  $("#tabla2").on('click','#eliminar_servicios',function(e){
    e.preventDefault();
    $(this).parent('td').parent('tr').remove();
  });
  /////////////////////////
  $("#tabla2").on('click','#cambiar_servicios',function(e){
    e.preventDefault();
    var c = $(this).parents('tr').find('input:eq(0)').val();//para sacar el valor de un objeto html (areglo input)
    $("#camb").val(c);
    $(this).parent('td').parent('tr').remove();
  });
  //////////////////////////
});
