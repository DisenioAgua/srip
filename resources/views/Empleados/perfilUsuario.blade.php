@extends('fondo')
@section('layout')
  {!!Form::model($users,['class' =>'form-horizontal form-label-left input_mask','autocomplete'=>'off','route' =>['users.update',$users->id],'method' =>'PUT','enctype'=>'multipart/form-data','files'=>true,'role'=>'form'])!!}
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Perfil de Usuario <small>Editar</small></h2>
        <div class="clearfix"></div>
      </div>
      <input type="hidden" name="bandera" value="3">
<div class="x_content">
  <div class="row">

    @foreach ($errors->get('name') as  $error)
      <div class="alert-d">
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
    @foreach ($errors->get('email') as  $error)
      <div class="alert-d">
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
    @foreach ($errors->get('password') as  $error)
      <div class="alert-d">
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
    @foreach ($errors->get('password_confirmation') as  $error)
      <div class="alert-d">
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
      @foreach ($errors->get('archivo') as  $error)
        <div class="alert-d">
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
<a href={!! asset('/inicio')!!} class="btn btn-default">Cancelar</a>
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
</div>
</div>
{!!Form::close()!!}
@endsection
