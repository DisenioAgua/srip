<div class="x_content">
  @foreach ($errors->get('nombre') as  $error)
    <div class="alert-d">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('nombre',null,['class'=>'form-control has-feedback-left','placeholder'=>'Nombre de la nueva Categoria'])!!}
    </div>
  </div>
  @foreach ($errors->get('descripcion') as  $error)
    <div class="alert-d">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('descripcion',null,['class'=>'form-control has-feedback-left','placeholder'=>'Descripción de la Categoria'])!!}
    </div>
  </div>
<center>
{!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('/categorias')!!} class="btn btn-default">Cancelar</a>
</center>
</div>
