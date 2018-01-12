@if ($bandera== 1)
  @php
    $valorCliente= null;
  @endphp
@else
  @php
    $valorCliente= $clientes->cliente_id;
  @endphp
@endif

<div class="x_content">
  <div class="row">
@php
  $hoy = Carbon\Carbon::now();
@endphp
@foreach ($errors->all() as $error)
    <?php echo("
    <script language='javascript'>
      swal('Error','".$error."','error');
    </script>
    ");?>
@endforeach
    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
      <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
      {!! Form::date('fecha_venta',$hoy,['max'=>$hoy->format('Y-m-d'),'class'=>'form-control has-feedback-left'])!!}
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
      <span class="fa fa-paste form-control-feedback left" aria-hidden="true"></span>
      {!! Form::text('num_factura',null,['class'=>'form-control has-feedback-left','placeholder'=>'Numero de Factura'])!!}
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
      <select class="form-control" name="cliente_id">
        <option value="0">Cliente</option>
        @foreach ($clientes as $cliente)
          @if ($valorCliente==$cliente->id && $valorCliente!= null)
            <option value="{{$cliente->id}}" selected="selected">{{$cliente->nombre}}</option>
          @else
            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
          @endif

        @endforeach
      </select>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Servicios Funerarios</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          @if(isset($servicios))
            <div class="row">
            @foreach ($servicios as $s => $ser)
                <div class="col-sm-3">
                  <table class="table">
                    <div class="pricing">
                      <div class="title">
                        {{$ser->nombre}}
                        <h1>${{$ser->precio($ser->id)}}</h1>
                      </div>
                      <div class="x_content">
                        <div class="">
                          <div class="pricing_features">
                            <ul class="list-unstyled text-left">
                              @foreach ($detalles as $ds => $dese)
                                @if ($ser->id == $dese->servicio_id)
                                  <li><i class="fa fa-check text-success"></i>@if($dese->producto_id != null)
                                    {{$dese->cantidad." ".$dese->nombreProductos($dese->producto_id)}}
                                  @else
                                    {{$dese->cantidad." ".$dese->nombreActivos($dese->activofijo_id)}}
                                  @endif</li>
                                @endif
                              @endforeach
                            </ul>
                          </div>
                        </div>
                        <div class="pricing_footer">
                          @if ($ser->validacion($ser->id))
                            <button type="submit" name="button" class="btn btn-success btn-block" value="{{$ser->id}}">Seleccionar</button>
                          @else
                            <button type="button" name="button" class="btn btn-default btn-block disabled">Seleccionar</button>
                          @endif
                        </div>
                      </div>
                    </div>
                  </table>

              </div>

            @endforeach
          </div>
          @endif

          </div>
        </div>

      </div>

</div>
</div>
