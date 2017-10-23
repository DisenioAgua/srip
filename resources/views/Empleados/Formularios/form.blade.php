<div class="x_content">
  <div class="row">
    @foreach ($errors->get('nombre') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('nombre',null,['class'=>'form-control has-feedback-left','placeholder'=>'Nombre del nuevo empleado'])!!}
      </div>
    </div>
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Usuario:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <select class="form-control" name="acceso">
          <option value="0">Seleccionar</option>
          <option value="1">Administrador</option>
          <option value="2">Encargado</option>
        </select>
      </div>
    </div>
    @foreach ($errors->get('apellido') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('apellido',null,['class'=>'form-control has-feedback-left','placeholder'=>'Apellido del nuevo empleado'])!!}
      </div>
    </div>
    @foreach ($errors->get('name') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>'Nombre de usuario'])!!}
      </div>
    </div>
    @foreach ($errors->get('direccion') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('direccion',null,['class'=>'form-control has-feedback-left','placeholder'=>'Dirección del empleado'])!!}
      </div>
    </div>
    @foreach ($errors->get('email') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('email',null,['class'=>'form-control has-feedback-left','placeholder'=>'Correo electronico'])!!}
      </div>
    </div>
    @foreach ($errors->get('telefono') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('telefono',null,['class'=>'form-control has-feedback-left','onKeyPress'=> 'return validarTelefono(this, event, this.value);','placeholder'=>'Teléfono del empleado'])!!}
      </div>
    </div>
    @foreach ($errors->get('password') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
        {!! Form::password('password',['class'=>'form-control has-feedback-left','placeholder'=>'Contraseña'])!!}
      </div>
    </div>
    @foreach ($errors->get('dui') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">DUI:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-indent form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('dui',null,['class'=>'form-control has-feedback-left','onKeyPress'=> 'return validarDui(this, event, this.value);','placeholder'=>'DUI'])!!}
      </div>
    </div>
    @foreach ($errors->get('password_confirmation') as  $error)
      <div class="alert-d" style="color: #a94442">
        <br>{{$error}}
      </div>
    @endforeach
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar Contraseña:</label>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
        {!! Form::password('password_confirmation',['class'=>'form-control has-feedback-left','placeholder'=>'Confirmar contraseña'])!!}
      </div>
    </div>
    <div class="form-group col-md-6 col-sm-9 col-xs-12">
      <label class="control-label col-md-3 col-ms-3 col-xs-12">Sexo:</label>
    <label>
   {!! Form :: radio("sexo",1,true,['class'=>'flat'])!!}Masculino
    </label>
    <label>
   {!! Form :: radio("sexo",0,false,['class'=>'flat'])!!}Femenino
    </label>
    </div>
      @foreach ($errors->get('archivo') as  $error)
        <div class="alert-d" style="color: #a94442">
          <br>{{$error}}
        </div>
      @endforeach
      <div class="form-group col-md-6 col-sm-9 col-xs-12">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          {!! Form::file('archivo',['id'=>'archivo'])!!}
          <output id= "foto">

          </output>
        </div>
      </div>
    </div>

  <!-- ///////////////////////// -->

  </div>

<!-- ///////////////////////// -->


  <center>
{!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('/users')!!} class="btn btn-default">Cancelar</a>
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
