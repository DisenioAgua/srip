 <button type="button" class="btn btn-primary btn-xs" onclick={!!"'estado(".$venta->id.");'"!!}/>
 <i class="fa fa-plus-circle"></i>
 </button>
{!!Form::close()!!}
<script type="text/javascript">
  function eliminar(id){
    return swal({
      title: 'Eliminar Registro',
      text: '¿Está seguro que desea eliminar este registro?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Si, ¡Eliminar!',
      cancelButtonText: 'No, ¡Cancelar!',
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-default',
      buttonsStyling: false
    }).then(function(){
      var dominio = window.location.host;
      $('#formulario').attr('action','http://'+dominio+'/srip/public/destroyVentas/'+id);
      $('#formulario').submit();
      swal('¡Hecho!',
           'El registro se ha eliminado',
            'success')
    }, function(dismiss){
      if(dismiss === 'cancel'){
        swal('Cancelado',
             'No se elimino el registro',
              'info')

      }
    });
  }
  function noEliminar(){
    swal('No se puede eliminar porque pertenece a una venta','Click al botón!','warning')
  }
  function estado(id){
    return swal({
      title: 'Devolver',
      text: '¿Devolucion de mobiliario?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Si, ¡Devolver!',
      cancelButtonText: 'No, ¡Cancelar!',
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-default',
      buttonsStyling: false
    }).then(function(){
      var dominio = window.location.host;
      $('#formulario').attr('action','http://'+dominio+'/srip/public/cambioestadoVenta/'+id);
      $('#formulario').submit();
      swal('¡Hecho!',
           'El registro se ha Regresado',
            'success')
    }, function(dismiss){
      if(dismiss === 'cancel'){
        swal('Cancelado',
             'No se Enrego el mobiliario',
              'info')

      }
    });
  }
</script>
