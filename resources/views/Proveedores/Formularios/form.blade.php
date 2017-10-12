<div class="x_content">
  @foreach ($errors->get('nombre') as  $error)
    <div class="alert-d">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('nombre',null,['class'=>'form-control has-feedback-left','placeholder'=>'Nombre del nuevo proveedor'])!!}
    </div>
  </div>
  @foreach ($errors->get('direccion') as  $error)
    <div class="alert-d">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('direccion',null,['class'=>'form-control has-feedback-left','placeholder'=>'Dirección del nuevo proveedor'])!!}
    </div>
  </div>
  @foreach ($errors->get('telefono') as  $error)
    <div class="alert-d">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('telefono',null,['class'=>'form-control has-feedback-left','onKeyPress'=> 'return validarTelefono(this, event, this.value);','placeholder'=>'Teléfono del nuevo proveedor'])!!}
    </div>
  </div>
  @foreach ($errors->get('nit') as  $error)
    <div class="alert-d">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">NIT:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-indent form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('nit',null,['class'=>'form-control has-feedback-left','placeholder'=>'NIT'])!!}
    </div>
  </div>
  <center>
{!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('/proveedores')!!} class="btn btn-default">Cancelar</a>
</center>
</div>
