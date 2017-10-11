var totalcompra=0.0;
$(document).ready(function(){
  var tabla=$("#tabla");
  $("#bagregar").on("click",function(e){
    e.preventDefault();
    codigoprodc=$("#lcodigo").val() || 0;
    nombreproducto=$("#lproducto").val() || 0;
    cantidad=$("#lcantidad").val() || 0;
    precio=$("#lprecio").val() || 0;
    total=$("#ltotal").val() || 0;

    if (codigoprodc && nombreproducto && cantidad && precio) {
      var subtotal=parseFloat(precio)*parseFloat(cantidad);
    $(tabla).append(
      "<tr data-codigo='"+codigoprodc+"' data-nomprod='"+nombreproducto+"' data-cantidad='"+cantidad+"' data-precio='"+precio+"' >"+
      "<td>"+codigoprodc+"</td>"+
      "<td>"+nombreproducto+"</td>"+
      "<td>"+cantidad+"</td>"+
      "<td>"+precio+"</td>"+
      "<td> <button id='btneliminar' class='btn-group btn btn-danger btn-xs'></button></td>"+
      "</tr>"
    );
    totalcompra+=parseFloat(precio)*parseFloat(cantidad);
    //alert(totalcompra);
    $("#ltotal").text(totalcompra);
    }
    else{
        return swal("Error","Debe seleccionar un producto!","error");
    }
  });
  $(document).on("click","#btneliminar",function(e){
    var tr=$(e.target).parents("tr");
    var tc=totalcompra;
    var totalfila=parseFloat($(this).parents('tr').find('td:eq(2)').text()) * parseFloat($(this).parents('tr').find('td:eq(3)').text());
    totalcompra=tc-totalfila;
    alert(totalcompra);
    tr.remove();
  });
});
