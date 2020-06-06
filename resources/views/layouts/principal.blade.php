
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
  <link href="{{ asset('assets/css/material-kit.css?v=4.0.2') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,700&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js" integrity="sha256-LddDRH6iUPqbp3x9ClMVGkVEvZTrIemrY613shJ/Jgw=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.waitforimages/1.5.0/jquery.waitforimages.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha256-zlmAH+Y2JhZ5QfYMC6ZcoVeYkeo0VEPoUnKeBd83Ldc=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" integrity="sha256-SVfZ7rfF8boo4UH6df28wTQeoPEpoQ+xdInu0K2ulYk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tween.js@16.3.4"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
  <style>
  .modal-backdrop.in
{
    opacity:10 !important;
}
  </style>

  <!-- Hotjar Tracking Code for https://industria.ivotalents.com -->
<script>
   (function(h,o,t,j,a,r){
       h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
       h._hjSettings={hjid:1537095,hjsv:6};
       a=o.getElementsByTagName('head')[0];
       r=o.createElement('script');r.async=1;
       r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
       a.appendChild(r);
   })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<script type="text/javascript">
    (function () {
        var options = {
            facebook: "1534923083250048", // Facebook page ID
            whatsapp: "+50761344220", // WhatsApp number
            call_to_action: "", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,facebook", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

</head>

<body class="profile-page sidebar-collapse">
  
  <nav class="navbar fixed-top navbar-expand-lg" id="sectionsNav">
    <div class="container">
      <div id="ivo-logo-head2" class="headAmplio">
        <a class="navbar-brand" style="padding: 0px" href="/">
          <img alt="" width="155px" src="{{ asset('assets/img/logo.svg') }}"></a>
        </div>
        <div id="ivo-logo-head3" class="headChico">
          <a class="navbar-brand" style="padding: 0px" href="/">
            <img alt="" width="75px" src="{{ asset('assets/img/logo2.png') }}"></a>
          </div>
          <div id="ivo-logo-head" class="navbar-translate" style="width:10%;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" style="display: flex!important;" >
            <ul class="navbar-nav" style="flex-direction: column; width:100%;margin-top:-40vh">
               
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                             Perfil
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('compras') }}">
                              Carrito
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('buscar') }}">
                               BUSCAR Talentos
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('misproyectos') }}">
                               Mis Proyectos
                            </a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}">
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
      <div id="app">
          @yield('content')
        </div>
 


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
        Copyright © 2017-{{  date("Y") }} Ivo Talents Company S.A. Todos los derechos reservados.
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


    <script async="" defer="" src="{{ asset('assets/js/cdn/buttons.js') }}"></script>
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

  <script src="{{ asset('assets/js/material-kit.min.js') }}" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/exif-js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.js"></script>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


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
