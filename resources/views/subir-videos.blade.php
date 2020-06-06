@extends('layouts.principal')

@section('content')
<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- the font awesome icon library if using with `fas` theme (or Bootstrap 4.x). Note that default icons used in the plugin are glyphicons that are bundled only with Bootstrap 3.x. -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
< script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script -->
<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/es.js"></script>

<style type="text/css">
 
  .fileUpload {
      position: relative;
      overflow: hidden;
      margin: 10px;
  }
  .fileUpload input.upload {
      position: absolute;
      top: 0;
      right: 0;
      margin: 0;
      padding: 0;
      font-size: 20px;
      cursor: pointer;
      opacity: 0;
      filter: alpha(opacity=0);
  }
  .error
  {
    color: red;
  }
  
  
  </style>


<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->industria->razon_social ? strtoupper($usuario->industria->razon_social) : "Nombre de la Empresa" }}</b>&nbsp;
          <a href="#" data-toggle="modal" data-target="#NombreEmpresa"><i class="material-icons" style="font-size:14px; cursor: pointer;color:white">border_color</i></a></h3>
             <p style="margin-top: -15px;margin-bottom: 0px; font-size: 13px; color:white" class="c-mini-subname">
             {{$usuario->industria->slogan ? strtoupper($usuario->industria->slogan) : "Slogan de la Empresa.." }}</p></div>
</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen">
          <div class="profile text-left" style="height: 80px;">
            <div class="avatar">
              @if ($usuario->avatar)
              <a href="#modal-imgperfil" data-toggle="modal">
                <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$usuario->id.'/540px_foto_'.$usuario->id.'.png'}}">
              </a>
               @else
               <a href="#modal-imgperfil" data-toggle="modal">
               <img alt="Circle Image" style="max-height: 160px;"  class="img-raised rounded-circle img-fluid" src="{{ asset('img/vatar2.png') }}">
              </a>
              @endif
        </div>

            <div class="menu-navegador">
              <ul class="">
                      <li class="list-horizontal">
                              <a class="btn-nav" href="{{ route('buscar') }}">
                                <i class="material-icons  mb-2">search</i> Buscar
                              </a>
                            </li>
                      <li class="list-horizontal">
                        <a class="btn-nav" href="{{ route('misproyectos') }}">
                          <i class="material-icons  mb-2">grade</i> Mis Proyectos
                        </a>
                      </li>
                      <li class="list-horizontal">
                              <a class="btn-nav btn btn-animation-blue" style="color: #ffffff;background-color:#1f8089" href="#" data-toggle="modal" data-target="#CrearProyecto">
                                <i class="material-icons">assignment</i> Crear Proyecto
                              </a>
                            </li>
                    </ul>
        </div>
       
          </div>
        </div>

        <div class="line-black">
                    <h5 class="in-line-black">Perfil</h5>
        </div>
      </div>
   

    

      <div class="row" style="margin-top: -30px">  
        <div class="col-md-12 ml-auto mr-auto">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if (Session::has('success'))
              <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <p>{{ Session::get('success') }}</p>
              </div>
          @endif
      </div>

        <div class="col-md-8 ml-auto mr-auto">
          <div class="card card-pricing" style="margin-top:5px">
            <div class="card-body">
              

              <form action="/subir-videos-upload" enctype="multipart/form-data" method="post">
                {{ csrf_field() }} 
                Casting ID: <br>
                <input name="casting_id" required id="casting_id" type="text"> 
                <br><br>
                Videos de Casting (puede subir mas de uno): <br>
                <input id="videos" name="videos[]" type="file" class="file" multiple 
                data-show-upload="false" required  data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                <br><br>
                <input type="submit" class="bt btn-primary btn-block btn-lg" value="Subir">
                </form>

              
            </div>
          </div>
        </div>


        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-pricing" style="margin-top:5px">
            <div class="card-body">

                @foreach($videos as $video)
                  <a href="https://ivotalent.s3-accelerate.amazonaws.com/{{$video->archivo}}"> {{$video->nombre}} ({{$video->casting_id}})</a><br>
                @endforeach

            </div>
          </div>
        </div>

        
        
      </div>



    </div>
  </div>
</div>
<div class="flotante">
    <div class="flotante-line">
        <h5 class="flotante-in-line">Perfil</h5>
    </div> 
    <div style="margin-top: 30px;margin-bottom: 50px;">
    <ul class="ul-foot">
        <li class="list-horizontal">
                <a class="btn-nav-foot" href="{{ route('buscar') }}">
                  <i class="material-icons">search</i>
                </a>
              </li>
        <li class="list-horizontal">
          <a class="btn-nav-foot" href="{{ route('misproyectos') }}">
            <i class="material-icons">grade</i>
          </a>
        </li>
        <li class="list-horizontal">
                <a class="btn-nav-foot" href="#">
                  <i class="material-icons">forum</i>
                </a>
              </li>
      </ul>  
    </div> 
</div> 



 
</div>



</div>



@endsection


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/themes/fas/theme.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/locales/es.js"></script>

<script type="text/javascript">

$("#videos").fileinput();



</script>




@endsection