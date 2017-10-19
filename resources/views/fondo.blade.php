@if (Auth::check())
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

<body class="nav-md">
  @if(Session::has('mensaje'))

<?php $men=Session::pull('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif

@if(Session::has('error'))

<?php $men=Session::pull('error');
echo "<script>swal('$men', 'Click al botón!', 'error')</script>";?>

@endif

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><img src= {!! asset("img/logo2.png") !!}  alt="" style="height:60px">
               <span>Srip</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->

          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-users"></i> Clientes</span></a>
                </li>
                <li><a href={!! asset('/proveedores')!!}><i class="fa fa-male"></i> Proveedores</span></a>
                </li>
                <li><a href={!! asset('/users')!!}><i class="fa fa-suitcase"></i> Empleados</span></a>
                </li>
                <li><a><i class="fa fa-car"></i> Activo Fijo</span></a>
                </li>
                <li><a><i class="fa fa-dollar"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="form.html">Pagos</a></li>
                  </ul>
                  <li><a><i class="fa fa-shopping-cart"></i> Compra<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href={!! asset('/compras/create')!!}>Compras</a></li>
                      <li><a href={!! asset('/compras')!!}>Mostrar Compras</a></li>
                      </ul>
                  </li>
                  <li><a href={!! asset('/productos')!!}><i class="fa fa-cubes"></i> Produto</span></a>
                  </li>
                </li>
                <li><a><i class="fa fa-lock"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="form.html">Bitacora</a></li>
                      <li><a href="form.html">Respaldo de ase de Datos</a></li>
                        <li><a href="form.html">Restauración de Base de Datos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-file-text"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="form.html">Reporte de clientes</a></li>
                      <li><a href="form.html">Reporte de Proveedores</a></li>
                        <li><a href="form.html">Repote de Activo Fijo</a></li>
                        <li><a href="form.html">Reporte de Venta</a></li>
                        <li><a href="form.html">Reporte de Compra</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-question-circle"></i> Ayuda</span></a>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->


        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <?php
                  $url="/imagenes/".(String)Auth::user()->foto;
                  ?>
                  {!! Html::image($url)!!}
                  {{Auth::user()->name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href={!! asset('/Perfil/'.Auth::user()->id)!!}> Perfil de usuario</a></li>


                  <li><a href={!! asset('/logout')!!}><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li>
                </ul>
              </li>


            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

@yield('layout')

        <br />
      </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Derechos Reservados UES-FMP <img src={!!asset("img/minerva.png") !!} alt="" style="height:45px">
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

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

</body>
</html>
@else
  <!DOCTYPE HTML>
  <!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="refresh" content="0; URL=/srip/public">
    </head>
    <body>
    </body>
  </html>
@endif
