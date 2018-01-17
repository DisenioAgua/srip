<div class="x_content">

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Factura:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('factura',null,['class'=>'form-control has-feedback-left','id'=>'Ifactura','placeholder'=>'factura'])!!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Abono:</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
       {!! Form::number('abono',null,['min'=>0.00,'step'=>0.05,'id'=>'Iabono','class'=>'form-control has-feedback-left','placeholder'=>'Abono'])!!}
    </div>
  </div>

<center>

<button type="button" name="button" id="Ipago" class="btn btn-default">Guardar</button>
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('/pagos')!!} class="btn btn-default">Cancelar</a>
</center>

</div>
