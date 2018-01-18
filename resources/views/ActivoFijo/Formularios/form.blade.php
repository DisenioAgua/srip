@if ($bandera== 0)
  @php
    $valorActivo= null;
  @endphp
@else
  @php
    $valorActivo= $activofijos->categoria_id;
  @endphp
@endif
<div class="x_content">
  @php
    $hoy = Carbon\Carbon::now();
  @endphp
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
        {!! Form::date('fecha_compra',$hoy,['max'=>$hoy->format('Y-m-d'),'class'=>'form-control has-feedback-left'])!!}
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
      {!! Form::text('nombre',null,['class'=>'form-control has-feedback-left','placeholder'=>'Nombre del Activo'])!!}
    </div>
  </div>

  @foreach ($errors->get('tipoactivo') as  $error)
    <div class="alert-d" style="color: #a94442">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Activo:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      @if (isset($activofijos))
        @php
          if($activofijos->tipoactivo){
            $aux='1';
          }else{
            $aux='0';
          }
        @endphp
        {!!Form::select('tipoactivo',['0'=>'Alquiler','1'=>'Local'],$aux,['class'=>'form-control','placeholder'=>'Seleccinar'])!!}
      @else
        {!!Form::select('tipoactivo',['0'=>'Alquiler','1'=>'Local'],null,['class'=>'form-control','placeholder'=>'Seleccinar'])!!}
      @endif
    </div>
  </div>
  @foreach ($errors->get('categoria_id') as  $error)
    <div class="alert-d" style="color: #a94442">
      <br>{{$error}}
    </div>
  @endforeach
      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria:</label>
      <div class="col-md-8 col-sm-9 col-xs-10">
        <select class="form-control" name="categoria_id">
          <option value="0">Seleccionar</option>
          @foreach ($categoriaactivos as $categoriaactivo)
            @if ($valorActivo==$categoriaactivo->id && $valorActivo!= null)
              <option value="{{$categoriaactivo->id}}" selected="selected">{{$categoriaactivo->nombre}}</option>
            @else
              <option value="{{$categoriaactivo->id}}">{{$categoriaactivo->nombre}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="btn-group">
        <a href={!! asset('/categoriaactivos')!!} class="btn btn-info btn-xs">
          <i class="fa fa-plus"></i></a>
        </div>
    </div>
    @foreach ($errors->get('precio') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Precio:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('precio',null,['class'=>'form-control has-feedback-left','placeholder'=>'Precio'])!!}
      </div>
    </div>
    @foreach ($errors->get('precioalquiler') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Precio de Alquiler:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
           {!! Form::number('precioalquiler',null,['min'=>0.00,'step'=>0.05,'id'=>'lprecio','class'=>'form-control has-feedback-left','placeholder'=>'Precio de Alquiler'])!!}
        </div>
      </div>
    @foreach ($errors->get('cantidad') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    @if ($bandera==0)
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <span class="fa fa-plus-square form-control-feedback left" aria-hidden="true"></span>
          {!! Form::text('cantidad',null,['class'=>'form-control has-feedback-left','placeholder'=>' Cantidad'])!!}
        </div>
      </div>
    @endif



<center>
{!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('/activofijos')!!} class="btn btn-default">Cancelar</a>
</center>
</div>
