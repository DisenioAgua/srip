@if ($bandera== 1)
  @php
    $valorProveedor= null;
  @endphp
@else
  @php
    $valorProveedor= $proveedores->proveedor_id;
  @endphp
@endif

<div class="x_content">
  <div class="row">

    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
      <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
      {!! Form::date('fecha_compra',null,['class'=>'form-control has-feedback-left'])!!}
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
      <span class="fa fa-paste form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('num_factura',null,['class'=>'form-control has-feedback-left','placeholder'=>'Numero de Factura'])!!}
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
      <select class="form-control" name="proveedor_id">
        <option value="0">Proveedor</option>
        @foreach ($proveedores as $proveedor)
          @if ($valorProveedor==$proveedor->id && $valorProveedor!= null)
            <option value="{{$proveedor->id}}" selected="selected">{{$proveedor->nombre}}</option>
          @else
            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
          @endif

        @endforeach
      </select>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12 form-group">
        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('compra_id',null,['id'=>'lcodigo','class'=>'form-control has-feedback-left','placeholder'=>'Codigo'])!!}
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12 form-group">
        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
        {!! Form::text('producto_id',null,['id'=>'lproducto','class'=>'form-control has-feedback-left','placeholder'=>'Nombre del producto'])!!}
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12 form-group">
        <span class="fa fa-plus-square-o form-control-feedback left" aria-hidden="true"></span>
        {!! Form::number('cantidad',null,['id'=>'lcantidad','class'=>'form-control has-feedback-left','placeholder'=>'Cantidad'])!!}
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12 form-group">
        <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
        {!! Form::number('precio',null,[ 'id'=>'lprecio','class'=>'form-control has-feedback-left','placeholder'=>'Precio'])!!}
      </div>
    </div>
    <center>
    <div class="row">
      <button id='bagregar' type="button" class="btn btn-success">
      Agregar</button>
    </div>
  </center>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detalle
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tabla" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                          </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
<div class="row">
  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
    {!! Form::number('total',null,[ 'id'=>'ltotal','class'=>'form-control has-feedback-left','placeholder'=>'Total'])!!}
  </div>
</div>
</div>
<center>
{!!Form::submit('Guardar',['class'=>'btn btn-default'])!!}
<button type="reset" name="button" class="btn btn-default">Limpiar</button>
<a href={!! asset('fondo')!!} class="btn btn-default">Cancelar</a>
</center>
</div>
