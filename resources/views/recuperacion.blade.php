@if (!Auth::check())<!-- debe ser negado con "!" -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Srip | </title>
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
  </head>

  <body class="login">
    @if(Session::has('mensaje'))
      <?php $men=Session::pull('mensaje');
      echo "<script>swal('$men','Click al botón!','success')</script>";?>
    @endif
    @if(Session::has('error'))
      <?php $men=Session::pull('error');
      echo "<script>swal('$men','Click al botón!','error')</script>";?>
    @endif
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {!! Form::open(['url'=>'pass/correo','method'=>'POST','autocomplete'=>'off'])!!}
              <h1>Recuperar Contraseña</h1>
              <div>
                {!!Form::text('email',null,['placeholder'=>'Correo'])!!}
              </div>
              <div>
                {!!Form::submit('Enviar')!!}
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <a href="index.html" ><img src= {!! asset("img/logo2.png") !!}  alt="" style="height:150px">
                     </a>
                </div>
              </div>
            {!!Form::close()!!}
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
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

@else
  <!DOCTYPE HTML>
  <!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="refresh" content="0; URL=/srip/public/inicio">
    </head>
    <body>
    </body>
  </html>
@endif
