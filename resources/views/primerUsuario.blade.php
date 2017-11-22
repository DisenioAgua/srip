
  <!-- Bootstrap -->
  {!!Html::style('assets/bootstrap/dist/css/bootstrap.min.css')!!}
  <!-- Font Awesome -->
  {!!Html::style('assets/font-awesome/css/font-awesome.min.css')!!}
  <!-- NProgress -->
  {!!Html::style('assets/nprogress/nprogress.css')!!}
  <!-- iCheck -->
  {!!Html::style('assets/iCheck/skins/flat/green.css')!!}
  <!-- bootstrap-progressbar -->
  {!!Html::style('assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')!!}
  <!-- JQVMap -->
  {!!Html::style('assets/jqvmap/dist/jqvmap.min.css')!!}
  <!-- bootstrap-daterangepicker -->
  {!!Html::style('assets/bootstrap-daterangepicker/daterangepicker.css')!!}

  {!!Html::script('assets/sweetalert2/dist/sweetalert2.js')!!}
  {!!Html::style('assets/sweetalert2/dist/sweetalert2.css')!!}

  <!-- Custom Theme Style -->
  {!!Html::style('assets/build/css/custom.css')!!}
{!!Form::open(['class' =>'form-horizontal form-label-left input_mask','enctype'=>'multipart/form-data','files'=>true,'autocomplete'=>'off','role'=>'form','route' =>'users.store','method' =>'POST'])!!}
<div class="col-md-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Registrarse </h2>
      <div class="clearfix"></div>
    </div>
    @php
      $bandera=1;
    @endphp
    <input type="hidden" name="bandera" value="1">
    @include('Empleados.Formularios.form')
  </div>
</div>
{!!Form::close()!!}
<!-- jQuery -->
{!!Html::script('assets/jquery/dist/jquery.min.js')!!}
<!-- Bootstrap -->
{!!Html::script('assets/bootstrap/dist/js/bootstrap.min.js')!!}
<!-- FastClick -->
{!!Html::script('assets/fastclick/lib/fastclick.js')!!}
<!-- NProgress -->
  {!!Html::script('assets/nprogress/nprogress.js')!!}
<!-- Chart.js -->
  {!!Html::script('assets/Chart.js/dist/Chart.min.js')!!}
<!-- gauge.js -->
  {!!Html::script('assets/gauge.js/dist/gauge.min.js')!!}
<!-- bootstrap-progressbar -->
  {!!Html::script('assets/bootstrap-progressbar/bootstrap-progressbar.min.js')!!}
<!-- iCheck -->
  {!!Html::script('assets/iCheck/icheck.min.js')!!}
<!-- Skycons -->
  {!!Html::script('assets/skycons/skycons.js')!!}
<!-- Flot -->
{!!Html::script('assets/Flot/jquery.flot.js')!!}
{!!Html::script('assets/Flot/jquery.flot.pie.js')!!}
{!!Html::script('assets/Flot/jquery.flot.time.js')!!}
{!!Html::script('assets/Flot/jquery.flot.stack.js')!!}
{!!Html::script('assets/Flot/jquery.flot.resize.js')!!}
<!-- Flot plugins -->
{!!Html::script('assets/flot.orderbars/js/jquery.flot.orderBars.js')!!}
{!!Html::script('assets/flot-spline/js/jquery.flot.spline.min.js')!!}
{!!Html::script('assets/flot.curvedlines/curvedLines.js')!!}
<!-- DateJS -->
{!!Html::script('assets/DateJS/build/date.js')!!}
<!-- JQVMap -->
{!!Html::script('assets/jqvmap/dist/jquery.vmap.js')!!}
{!!Html::script('assets/jqvmap/dist/maps/jquery.vmap.world.js')!!}
{!!Html::script('assets/jqvmap/examples/js/jquery.vmap.sampledata.js')!!}
<!-- bootstrap-daterangepicker -->
{!!Html::script('assets/moment/min/moment.min.js')!!}
{!!Html::script('assets/bootstrap-daterangepicker/daterangepicker.js')!!}

<!-- Custom Theme Scripts -->
{!!Html::script('assets/build/js/custom.min.js')!!}
  {!!Html::script('assets/js/validaciones.js')!!}
  {!!Html::script('js/compras.js')!!}
