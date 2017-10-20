function validarTelefono(obj, e,valor)
{
  tecla = (document.all) ? e.keyCode : e.which;
  val= tecla;
  tecla = String.fromCharCode(tecla);
  aux=false;
  if(valor==''){
    if(tecla=='7' || tecla=='6' || tecla=='2'){
      aux=true;
    }
  }else if(valor[0]==6 || valor[0]==7 || tecla=='2'){
    if(val > 47 && val < 58){
      if(valor.length<4){
        aux=true;
      }
    }
  }
  if(valor.length==4 && tecla=='-'){
    aux=true;
  }else{
    if(val > 47 && val < 58){
      if(valor.length>4 && valor.length<9){
        aux=true;
      }
    }
   }
   return aux;
 }
 ///validacion del dui
 function validarDui(obj,e,valor){
tecla = (document.all) ? e.keyCode : e.which;
if(tecla > 47 && tecla < 58 && valor.length<8){
  return true;
}else if(tecla==45 && valor.length==8)
{
  return true;
}else if(tecla > 47 && tecla < 58 && valor.length==9)
{
return true;
}
  return false;
}
///validacion del nit
function validarNit(obj,e,valor){
tecla = (document.all) ? e.keyCode : e.which;
letra = String.fromCharCode(tecla);
if(tecla > 47 && tecla < 58 && valor.length<4){
return true;

}else if(valor.length==4 && letra=='-'){
return true;
}else if (tecla > 47 && tecla < 58 && valor.length>4 &&  valor.length<11) {
  return true;
}else if (valor.length==11 && letra=='-') {
  return true;
}else if (tecla > 47 && tecla < 58 && valor.length>11 &&  valor.length<15) {
return true;
}else if (valor.length==15 && letra=='-') {
  return true;
}else if (tecla > 47 && tecla < 58 &&  valor.length==16) {
return true;
}else{
  return false;
}
}
