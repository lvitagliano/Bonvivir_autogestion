
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }} ">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>IvoTalents | Industria</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-kit.css?v=2.1.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,700&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js" integrity="sha256-LddDRH6iUPqbp3x9ClMVGkVEvZTrIemrY613shJ/Jgw=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.waitforimages/1.5.0/jquery.waitforimages.min.js" type="text/javascript"></script>
<style>

/*
@media screen and (min-width: 992px) {
  .spinner {
      width: 100px;
      height: 100px;
      top: 44%;
      left: 44%;
      background-color: #333;
      position: relative;
      position: absolute;
      border-radius: 100%;  
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    .spinlogo {
      width: 100px;
      height: 100px;
      top: 44%;
      left: 44%;
      background-color: #333;
      position: relative;
      position: absolute;
      border-radius: 100%;  
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }
}

@media screen and (max-width: 992px) {
  .spinner {
      width: 100px;
      height: 100px;
      top: 48%;
      left: 48%;
      background-color: #333;
      position: relative;
      position: absolute;
      border-radius: 100%;  
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    .spinlogo {
      width: 100px;
      height: 100px;
      top: 48%;
      left: 48%;
      background-color: #333;
      position: relative;
      position: absolute;
      border-radius: 100%;  
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }
}


@media screen and (max-width: 600px) {
  .spinner {
  width: 100px;
  height: 100px;
  top: 38%;
  left: 38%;
  background-color: #333;
  position: relative;
  position: absolute;
  border-radius: 100%;  
  -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
  animation: sk-scaleout 1.0s infinite ease-in-out;
}



.spinlogo {
  width: 100px;
  height: 100px;
  top: 38%;
  left: 38%;
  background-color: #333;
  position: relative;
  position: absolute;
  border-radius: 100%;  
  -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
  animation: sk-scaleout 1.0s infinite ease-in-out;
}

}





@-webkit-keyframes sk-scaleout {
  0% { -webkit-transform: scale(0) }
  100% {
    -webkit-transform: scale(1.0);
    opacity: 0;
  }
}

@keyframes sk-scaleout {
  0% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 100% {
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
    opacity: 0;
  }
}
.spinner-wrapper {
position: fixed;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: white;
z-index: 999999;
}


*/

</style>
</head>

<body class="profile-page sidebar-collapse">
  <nav class="navbar fixed-top navbar-expand-lg" id="sectionsNav">
    <div class="container">
      <div  class="navbar-translate">
        <a  class="navbar-brand" style="padding: 0px" href="#">
          <img id="ivo-logo-head" alt="" width="155px" src="{{ asset('assets/img/logo.svg') }}"></a>
       
      </div>
      <div class="collapse navbar-collapse" style="display: flex!important;">
            <ul class="navbar-nav" style="flex-direction: column; width:100%">
               
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                             Perfil
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                               Chat
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              Carrito
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('mistalentos') }}">
                               Mis Talentos
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              Configuración
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              Soporte
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              F.A.Q
                            </a>
                          </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('mistalentos') }}">
                        Cerrar Sesión
                      </a>
                    </li>
                   
                  </ul>
      </div>
    </div>
  </nav>
 
  <div class="spinner-wrapper">
    <div class="spinner">
        </div>    
      </div>
  @yield('content')

  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="#">
              <b>Síguenos:</b>
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
        Copyright © 2017-2019 Ivo Talents Company S.A. Todos los derechos reservados.
      </div>
    </div>
  </footer>
    <!--   Core JS Files   -->
    
      <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="{{ asset('assets/js/moment.min.js') }}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>


	<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/material.min.js') }}"></script>



	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{ asset('assets/js/nouislider.min.js') }}" type="text/javascript"></script>


    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('assets/js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>    
	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
	<script src="{{ asset('assets/js/bootstrap-tagsinput.js') }}"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/jquery.flexisel.js') }}" type="text/javascript"></script>

	<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
  <script src="{{ asset('assets/assets-for-demo/vertical-nav.js') }}" type="text/javascript"></script>


  
  <script src="{{ asset('assets/demo/demo.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/js/material-kit.min.js?v=2.1.1') }}" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/exif-js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.js"></script>




<script>
$( "#btn-toggle" ).on( "click", function() {
  var clase = document.getElementById("btn-toggle").className;

  if(clase == 'navbar-toggler'){
    document.getElementById('ivo-logo-head').style.display = "none";
  } else {
    document.getElementById('ivo-logo-head').style.display = "block";
  }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

   /*   $(document).ready(function() {
      //Preloader
        $(window).on("load", function() {
        preloaderFadeOutTime = 500;
            function hidePreloader() {
              var preloader = $('.spinner-wrapper');
              preloader.fadeOut(preloaderFadeOutTime);
            }
        hidePreloader();
        });
      });

*/

       
//////////////FUNCION PARA COMBOS DE CIUDAD Y PAIS DEPENDIENTES


$('select[id="pais"]').on('change', function(){
    var countryId = $(this).val();
    if(countryId) {
        $.ajax({
            url: 'api/ciudades/porpais/'+countryId,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader').css("visibility", "visible");
            },

            success:function(data) {

                $('select[id="ciudad"]').empty();
                var options = "";

                $.each(data, function(key, value){
                    options = "<option value='"+key+"'>"+value+"</option>";
                    $('select[id="ciudad"]').append(options);
                });

                $('select[id="ciudad"]').selectpicker('refresh');

            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[id="pais"]').empty();
    }

});



</script>    
    


@yield('scripts')


</body>

</html>
