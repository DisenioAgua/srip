$(document).ready(function(){
    $("#Ipago").on("click",function(e){
      e.preventDefault();
    pform=$("#Iform");
    pfactura=$("#Ifactura").val() || 0;
    pabono=$("#Iabono").val() || 0;
    $.ajax({
      type: "GET",
      url: "/srip/public/validar/"+ pfactura,
      success: function(respuesta){
        if (parseFloat(respuesta) == parseFloat(pabono)) {
          pform.submit();
        } else if(parseFloat(respuesta) > parseFloat(pabono)){
          pform.submit();

        }
      },
    });
  });
});
