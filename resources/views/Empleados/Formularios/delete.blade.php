{!!Form::open(['method'=>'POST','id'=>'formulario'])!!}
<a href={!! asset('/users/'.$user->id.'/edit')!!} class="btn btn-xs btn-primary">
<i class="fa fa-edit"></i>
 </a>
<button type="button" class="btn btn-danger btn-xs" onclick={!!"'eliminar(".$user->id.");'"!!}/>
<i class="fa fa-remove"></i>
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
      $('#formulario').attr('action','http://'+dominio+'/fjj/public/destroyUser/'+id);
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
</script>
