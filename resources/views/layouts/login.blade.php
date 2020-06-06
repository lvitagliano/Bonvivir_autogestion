<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Ivotalents Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-kit.css?v=2.1.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
</head>

<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="float-none">
            <img alt="" width="255px" src="https://industria.ivotalents.com/assets/img/logo/logo.svg"></a>

    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('{{ asset('assets/img/ivo1.jpeg') }}'); background-size: cover; background-position: top center;">

    @yield('content')
  
    <footer class="footer footer-default">
            <div class="container">
              <nav class="float-left">
                <ul>
                  <li>
                    <a href="#">
                      <b>Siguenos:</b>
                    </a>
                  </li>
                  <li>
                   <button class="btn btn-just-icon btn-round btn-facebook">
                        <i class="fa fa-facebook"> </i>
                      <div class="ripple-container"></div></button>
                  </li>
                  <li>
                   <button class="btn btn-just-icon btn-round btn-twitter">
                        <i class="fa fa-twitter"></i>
                      <div class="ripple-container"></div></button>
                  </li>
                  <li>
                    <button class="btn btn-just-icon btn-round btn-instagram">
                        <i class="fa fa-instagram"> </i>
                      <div class="ripple-container"></div></button>
                  </li>
                </ul>
              </nav>
              <div class="copyright float-right">
              Copyright © 2017-{{  date("Y") }} Ivo Talents Company S.A. Todos los derechos reservados.  
              </div>
            </div>
          </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>    
</body>

</html>

           
