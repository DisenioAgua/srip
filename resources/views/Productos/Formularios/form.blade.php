@if ($bandera== 1)
  @php
    $valorCategoria= null;
  @endphp
@else
  @php
    $valorCategoria= $productos->categoria_id;
  @endphp
@endif
<div class="x_content">
  @foreach ($errors->get('codigo') as  $error)
    <div class="alert-d" style="color: #a94442">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Código:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('codigo',null,['class'=>'form-control has-feedback-left','placeholder'=>'Codigo del producto'])!!}
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
      <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('nombre',null,['class'=>'form-control has-feedback-left','placeholder'=>'Nombre del producto'])!!}
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
          @foreach ($categorias as $categoria)
            @if ($valorCategoria==$categoria->id && $valorCategoria!= null)
              <option value="{{$categoria->id}}" selected="selected">{{$categoria->nombre}}</option>
            @else
              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endif

          @endforeach
        </select>
      </div>
      <div class="btn-group">
        <a href={!! asset('/categorias')!!} class="btn btn-info btn-xs">
          <i class="fa fa-plus"></i></a>
        </div>
    </div>
  </div>
  @foreach ($errors->get('archivo') as  $error)
    <div class="alert-d" style="color: #a94442">
      <br>{{$error}}
    </div>
  @endforeach
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      {!! Form::file('archivo',['id'=>'archivo'])!!}
      <output id= "foto">

      </output>

    </div>
  </div>

<center>
{!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('/productos')!!} class="btn btn-default">Cancelar</a>
</center>
</div>
<script type="text/javascript">
  function foto(evt){
    var files = evt.target.files;

    for(var i = 0, f; f = files[i]; i++){
      if(!f.type.match('image.*')){
        continue;
      }
      var reader = new FileReader();

      reader.onload = (function(theFile){
        return function(e){
          document.getElementById('foto').innerHTML = ['<img style="height: 200px" src = "', e.target.result,'"/>'].join('');
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('archivo').addEventListener('change', foto, false);
</script>
