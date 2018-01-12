@php
  use App\DetalleCompra;
  $contador = DetalleCompra::existeProducto($producto->id);
@endphp
{!!Form::open(['method'=>'POST','id'=>'formulario'])!!}
<a href={!! asset('productos/'.$producto->id) !!} class='btn btn-xs btn-dark'><i class='fa fa-eye'></i></a>
<a href={!! asset('/productos/'.$producto->id.'/edit')!!} class="btn btn-xs btn-primary">
<i class="fa fa-edit"></i> 
 </a>
 @if ($contador== 0)

   <button type="button" class="btn btn-danger btn-xs" onclick={!!"'eliminar(".$producto->id.");'"!!}/>
     <i class="fa fa-remove"></i>
   </button>
 @else
   <button type="button" class="btn btn-danger btn-xs" onclick={!!"'noEliminar();'"!!}/>
     <i class="fa fa-remove"></i>
   </button>
 @endif
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
      $('#formulario').attr('action','http://'+dominio+'/srip/public/destroyProducto/'+id);
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
    swal('No se puede eliminar porque pertenece a una compra','Click al botón!','warning')
  }
</script>
