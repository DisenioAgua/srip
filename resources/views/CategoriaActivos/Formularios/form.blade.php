<div class="x_content">
  @foreach ($errors->get('codigo') as  $error)
    <div class="alert-d" style="color: #a94442">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Codigo:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('codigo',null,['class'=>'form-control has-feedback-left','placeholder'=>'Codigo'])!!}
    </div>
  </div>
  @foreach ($errors->get('nombre') as  $error)
    <div class="alert-d" style="color: #a94442">
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
  @foreach ($errors->get('tipodepreciacion') as  $error)
    <div class="alert-d" style="color: #a94442">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Depreciación:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="form-control-feedback left" aria-hidden="true"></span>
      <select class="form-control" name="tipodepreciacion">
        @if ($bandera == 0)
          <option value="4">Seleccionar</option>
          <option value="0">Edificaciones</option>
          <option value="1">Maquinaria</option>
          <option value="2">Vehiculos</option>
          <option value="3">Otros Bienes Muebles</option>
        @else
          @if ($categoriaactivos->tipodepreciacion==0)
            <option value="0" selected >Edificaciones</option>
          @else
            <option value="0">Edificaciones</option>
          @endif
          @if ($categoriaactivos->tipodepreciacion==1)
            <option value="1" selected >Maquinaria</option>
          @else
            <option value="1">Maquinaria</option>
          @endif
          @if ($categoriaactivos->tipodepreciacion==2)
            <option value="2" selected >Vehiculos</option>
          @else
            <option value="2">Vehiculos</option>
          @endif
          @if ($categoriaactivos->tipodepreciacion==3)
            <option value="3" selected >Otros Bienes Muebles</option>
          @else
            <option value="3">Otros Bienes Muebles</option>
          @endif
        @endif

      </select>
    </div>
  </div>
<center>
{!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('/categoriasactivos')!!} class="btn btn-default">Cancelar</a>
</center>
</div>
