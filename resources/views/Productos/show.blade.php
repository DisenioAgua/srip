@extends('fondo')
@section('layout')
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Producto: {{$productos['codigo']}}</h2>
        <div class="clearfix"></div>
        <?php $url = Storage::url($productos['ruta']);
        $url="/imagenes/".$productos['ruta'];
        ?>
        {!! Html::image($url,'',array('class'=>'','width'=>'150', 'heigth'=>'150'))!!}
      </div>
    </div>
  </div>
@endsection
