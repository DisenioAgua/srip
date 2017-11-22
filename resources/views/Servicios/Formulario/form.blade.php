<div class="x_content">
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('nombre',null,['class'=>'form-control has-feedback-left','placeholder'=>'Nombre del servicio'])!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ganancia:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('ganancia',null,['class'=>'form-control has-feedback-left','placeholder'=>'ganancia'])!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Buscar:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('buscarx',null,['class'=>'form-control has-feedback-left','id'=>'buscar','placeholder'=>'Nombre del servicio'])!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('cantidad',null,['class'=>'form-control has-feedback-left','id'=>'cantidad','placeholder'=>'cantidad'])!!}
      </div>
    </div>

        <table class="table table-striped" id='tabla'>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Opciones</th>
            </tr>
          </thead>
        </table>

    <center>
      {!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
      <button type="reset" name="button" class="btn btn-default">Limpiar</button>
      <a href={!! asset('/servicios')!!} class="btn btn-default">Cancelar</a>
    </center>

  </div>
  <div class="col-md-6">
    <table class="table table-striped" id='tabla2'>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Opciones</th>
        </tr>
      </thead>
     @if ($bandera==0)
        <input type="hidden" name="cambio[]" value="ninguno" id='camb'>
          @foreach($detalle_servicios as $detalle_servicio)
        <tr>
          <td>
            @if ($detalle_servicio->producto_id!="")
              {{$detalle_servicio->producto->nombre}}
            @else
              {{$detalle_servicio->activo->nombre}}
            @endif
          </td>
          <td>{{$detalle_servicio->cantidad}}</td>
          <td>
            <input type='hidden' name='servicioscambios[]' value ={{$detalle_servicio->id}}>
            <button type='button' class='btn btn-xs btn-danger' id='cambiar_servicios'>
            <i class='fa fa-remove'></i>
            </button>
          </td>
        </tr>
          @endforeach
      @endif
  </div>
</table>
</div>
